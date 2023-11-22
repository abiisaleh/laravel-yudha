<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DistributorResource\Pages;
use App\Filament\Admin\Resources\DistributorResource\RelationManagers;
use App\Models\Toko;
use Cheesegrits\FilamentGoogleMaps\Fields\Map;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                    Select::make('jenis')
                        ->required()
                        ->options([
                            'teknisi' => 'Teknisi',
                            'distributor' => 'Distributor',
                        ]),
                    FileUpload::make('gambar'),
                ])->columnSpan(1),
                Grid::make(1)->schema([
                    Grid::make()->schema([
                        Select::make('kecamatan')
                            ->required(),
                        Select::make('kelurahan')
                            ->required(),
                    ]),
                    Textarea::make('alamat')
                        ->required(),
                    Map::make('location')
                        ->mapControls([
                            'mapTypeControl'    => true,
                            'scaleControl'      => true,
                            'streetViewControl' => false,
                            'rotateControl'     => false,
                            'fullscreenControl' => true,
                            'searchBoxControl'  => false, // creates geocomplete field inside map
                            'zoomControl'       => true,
                        ])
                        ->clickable()
                        ->defaultLocation([-2.5651354, 140.5986246])
                        ->defaultZoom(12),
                ])->columnSpan(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(Toko::where('jenis', 'distributor'))
            ->columns([
                TextColumn::make('nama')->searchable(),
                TextColumn::make('user.email')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
