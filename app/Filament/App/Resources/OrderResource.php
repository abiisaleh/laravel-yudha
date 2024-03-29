<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\OrderResource\Pages;
use App\Filament\App\Resources\OrderResource\RelationManagers;
use App\Models\Barang;
use App\Models\Order;
use App\Models\OrderBarang;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $pluralLabel = 'Order';

    protected static bool $isScopedToTenant = false;

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make()
                    ->schema([
                        TextEntry::make('toko.nama')
                            ->label('Distributor'),
                        TextEntry::make('toko.user.email')
                            ->label('Email'),
                    ])
                    ->columns(2),
                Section::make()
                    ->schema([
                        TextEntry::make('created_at')
                            ->date('d M Y'),
                    ]),
                Section::make()
                    ->schema([
                        TextEntry::make('user.name')
                            ->label('Pemesan'),
                        TextEntry::make('user.email')
                            ->label('Email'),
                        TextEntry::make('user.toko.nama')
                            ->label('Toko'),
                        TextEntry::make('user.toko.kecamatan')
                            ->label('Kecamatan'),
                        TextEntry::make('user.toko.kelurahan')
                            ->label('Kelurahan'),
                        TextEntry::make('user.toko.alamat')
                            ->label('Alamat'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('toko_id')
                    ->native(false)
                    ->searchable()
                    ->relationship('toko', 'nama', fn (Builder $query) => $query->where('jenis', 'distributor'))
                    ->required()
                    ->label('Distributor')
                    ->preload()
                    ->live(),
                Forms\Components\Repeater::make('orderBarangs')
                    ->relationship()
                    ->mutateRelationshipDataBeforeCreateUsing(function (array $data): array {
                        //mengurangi stok barang
                        $barang = Barang::find($data['barang_id']);
                        $barang->stok -= $data['qty'];
                        $barang->save();

                        return $data;
                    })
                    ->schema([
                        Forms\Components\Select::make('barang_id')
                            ->native(false)
                            ->searchable()
                            ->options(fn (Barang $query, Get $get) => $query->where('toko_id', $get('../../toko_id'))->where('stok', '>', 0)->pluck('nama', 'id'))
                            ->required()
                            ->afterStateUpdated(function (Set $set, $state) {
                                $barang = Barang::find($state);
                                if ($barang) {
                                    $set('harga', $barang->harga);
                                    $set('barang', $barang->nama);
                                }
                            })
                            ->live()
                            ->preload(),
                        Forms\Components\TextInput::make('harga')
                            ->prefix('Rp')
                            ->disabled()
                            ->dehydrated(),
                        Forms\Components\TextInput::make('qty')
                            ->default(0)
                            ->minValue(1)
                            ->maxValue(fn (Barang $query, Get $get) =>  $query->find($get('barang_id'))->stok ?? 0)
                            ->required()
                            ->afterStateUpdated(function (Set $set, Get $get, $state) {
                                $barang = Barang::find($get('barang_id'));
                                if ($barang) {
                                    $set('subtotal', $barang->harga * $state);
                                }
                            })
                            ->live()
                            ->numeric(),
                        Forms\Components\TextInput::make('subtotal')
                            ->prefix('Rp')
                            ->disabled()
                            ->dehydrated(),
                        Forms\Components\Hidden::make('barang')
                            ->dehydrated(),
                    ])
                    ->visibleOn('create')
                    ->columns(2)
                    ->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        if (auth()->user()->role == 'teknisi') {
            $query = Order::query()->where('user_id', auth()->id());
            $collumn = [
                Tables\Columns\TextColumn::make('toko.nama')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('lunas')
                    ->boolean(),
                Tables\Columns\IconColumn::make('diterima')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->since()
                    ->sortable(),
            ];
        } else {
            $query = Order::query()->where('toko_id', Filament::getTenant()->id);
            $collumn = [
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('lunas'),
                Tables\Columns\ToggleColumn::make('diterima'),
                Tables\Columns\TextColumn::make('created_at')
                    ->since()
                    ->sortable(),
            ];
        }

        return $table
            ->query($query)
            ->columns($collumn)
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\OrderBarangsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return auth()->user()->role == 'teknisi';
    }

    public static function getNavigationBadge(): ?string
    {
        if (auth()->user()->role == 'distributor') {

            $dataCount = static::getModel()::where('diterima', false)->count();

            if ($dataCount == 0)
                return null;

            return $dataCount;
        }

        return null;
    }
}
