<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\PesanBarangResource\Pages;
use App\Filament\Resources\PesanBarangResource\RelationManagers;
use App\Models\Barang;
use App\Models\PesanBarang;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;

class PesanBarangResource extends Resource
{
    protected static ?string $model = PesanBarang::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $pluralLabel = 'Order';

    // protected static ?string $navigationGroup = 'Distributor';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('toko_id')
                    ->native(false)
                    ->relationship('toko', 'nama', fn (Builder $query) => $query->whereHas('user', fn ($query) => $query->where('role', 'distributor')))
                    ->required()
                    ->label('Distributor')
                    ->live(),

                Forms\Components\Repeater::make('cart')
                    ->schema([
                        Forms\Components\Select::make('barang')
                            ->native(false)
                            ->relationship('barang', 'nama', fn (Builder $query, Get $get) => $query->where('toko_id', $get('../../toko_id')))
                            ->required()
                            ->preload(),
                        Forms\Components\TextInput::make('qty')
                            ->default(1)
                            ->minValue(0)
                            ->required()
                            ->numeric(),
                    ])
                    ->columns(2)
                    ->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('barang_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('qty')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('lunas')
                    ->boolean()
                    ->visible(auth()->user()->role == 'teknisi'),
                Tables\Columns\IconColumn::make('diterima')
                    ->boolean()
                    ->visible(auth()->user()->role == 'teknisi'),
                Tables\Columns\ToggleColumn::make('lunas')
                    ->visible(auth()->user()->role == 'distributor'),
                Tables\Columns\ToggleColumn::make('diterima')
                    ->visible(auth()->user()->role == 'distributor'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPesanBarangs::route('/'),
            'create' => Pages\CreatePesanBarang::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditPesanBarang::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return auth()->user()->role == 'teknisi';
    }
}
