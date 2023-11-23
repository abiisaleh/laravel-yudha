<?php

namespace App\Livewire;

use App\Models\Perbaikan;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class ListPerbaikan extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Perbaikan::query()->whereHas('user', fn (Builder $query) => $query->where('user_id', auth()->id())))
            ->columns([
                TextColumn::make('created_at')
                    ->date('d/m/yy')
                    ->label('Dikirim'),
                TextColumn::make('toko.nama'),
                TextColumn::make('detail_kerusakan')
                    ->limit(30),
                TextColumn::make('biaya')
                    ->numeric(),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make(),
                // ViewAction::make(),
                Action::make('Review')
                    ->label(fn (Model $record): string => (!is_null($record->rating)) ? 'Reviewed' : 'Review')
                    ->disabled(fn (Model $record): bool => !is_null($record->rating))
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function render(): View
    {
        return view('livewire.list-perbaikan');
    }
}
