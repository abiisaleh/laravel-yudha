<?php

namespace App\Filament\App\Pages\Tenancy;

use Cheesegrits\FilamentGoogleMaps\Fields\Map;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Tenancy\EditTenantProfile;
use Illuminate\Database\Eloquent\Model;

class EditTeam extends EditTenantProfile
{
    public static function getLabel(): string
    {
        return 'Toko profile';
    }

    public function form(Form $form): Form
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
            ])->columns(2);
    }
}
