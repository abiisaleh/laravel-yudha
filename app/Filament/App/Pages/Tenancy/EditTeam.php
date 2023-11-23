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
                ])->columnSpan(1),
            ])->columns(2);
    }
}
