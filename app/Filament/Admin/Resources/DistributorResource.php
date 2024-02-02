<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DistributorResource\Pages;
use App\Filament\Admin\Resources\DistributorResource\RelationManagers;
use App\Models\Toko;
use App\Models\User;
use Cheesegrits\FilamentGoogleMaps\Fields\Map;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\File;

class DistributorResource extends Resource
{
    protected static ?string $model = Toko::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    protected static ?string $pluralLabel = 'Distributor';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(1)->schema([
                    TextInput::make('nama')
                        ->required(),
                    FileUpload::make('gambar'),
                ])->columnSpan(1),
                Grid::make(1)->schema([
                    Grid::make()->schema([
                        Select::make('kecamatan')
                            ->native(false)
                            ->options(function () {
                                $data = File::json('kotajayapura.json');
                                foreach ($data as $key => $value) {
                                    $options[$key] = $key;
                                }
                                return $options;
                            })
                            ->required(),
                        Select::make('kelurahan')
                            ->native(false)
                            ->options(function (Get $get) {
                                $kecamatan = $get('kecamatan');
                                $data = File::json('kotajayapura.json');
                                if (!$kecamatan) {
                                    return [];
                                }

                                foreach ($data[$kecamatan] as $item) {
                                    $options[$item] = $item;
                                }
                                return $options;
                            })
                            ->required(),
                    ]),
                    Textarea::make('alamat')
                        ->required(),
                ])->columnSpan(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(User::where('role', 'distributor'))
            ->columns([
                TextColumn::make('toko.nama')->searchable(),
                TextColumn::make('toko.kecamatan')->searchable(),
                TextColumn::make('toko.kelurahan')->searchable(),
                TextColumn::make('email')->searchable(),
                ToggleColumn::make('verified'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->url(fn (User $record) => 'distributors/' . $record->toko->first()->id . '/edit')
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListDistributors::route('/'),
            'create' => Pages\CreateDistributor::route('/create'),
            'edit' => Pages\EditDistributor::route('/{record}/edit'),
        ];
    }
}
