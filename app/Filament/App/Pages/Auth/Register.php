<?php

namespace App\Filament\App\Pages\Auth;

use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Pages\Auth\Register as BaseRegister;

class Register extends BaseRegister
{

  public function form(Form $form): Form
  {

    return $form
      ->schema([
        Select::make('role')
          ->options([
            'teknisi' => 'Teknisi',
            'distributor' => 'Distributor',
          ])
          ->required()
          ->label('Jenis'),
        $this->getNameFormComponent(),
        $this->getEmailFormComponent(),
        $this->getPasswordFormComponent(),
        $this->getPasswordConfirmationFormComponent(),
      ]);
  }
}
