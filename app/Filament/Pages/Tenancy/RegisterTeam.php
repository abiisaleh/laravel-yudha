<?php

namespace App\Filament\Pages\Tenancy;

use App\Models\Toko;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Tenancy\RegisterTenant;
use Illuminate\Database\Eloquent\Model;

class RegisterTeam extends RegisterTenant
{
    public static function getLabel(): string
    {
        return 'Register toko';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->required(),
                Select::make('kecamatan')
                    ->required(),
                Select::make('kelurahan')
                    ->required(),
                Textarea::make('alamat')
                    ->required(),
                FileUpload::make('gambar'),
            ]);
    }

    protected function handleRegistration(array $data): Toko
    {
        $team = Toko::create($data);

        $team->members()->attach(auth()->user());

        return $team;
    }
}
