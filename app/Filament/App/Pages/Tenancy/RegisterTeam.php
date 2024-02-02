<?php

namespace App\Filament\App\Pages\Tenancy;

use App\Models\Toko;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Pages\Tenancy\RegisterTenant;
use Illuminate\Support\Facades\File;


class RegisterTeam extends RegisterTenant
{
    public static function getLabel(): string
    {
        return 'Register Toko';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(1)
                    ->schema([
                        TextInput::make('nama')
                            ->required(),
                        FileUpload::make('gambar'),
                    ])
                    ->columnSpan(1),
                Grid::make(1)
                    ->schema([
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
                    ])
                    ->columnSpan(1),
            ])
            ->columns(1);
    }

    protected function handleRegistration(array $data): Toko
    {
        $data['jenis'] = auth()->user()->role;
        $toko = Toko::create($data);

        $toko->user()->attach(auth()->user());

        return $toko;
    }
}
