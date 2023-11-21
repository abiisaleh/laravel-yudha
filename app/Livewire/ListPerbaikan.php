<?php

namespace App\Livewire;

use App\Models\Perbaikan;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
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
                TextColumn::make('detail_kerusakan'),
                TextColumn::make('toko.nama'),
                TextColumn::make('biaya')
                    ->numeric(),
                IconColumn::make('lunas')
                    ->boolean(),
                IconColumn::make('selesai')
                    ->boolean(),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                ViewAction::make(),
                Action::make('Review')
                    ->label(fn (Model $record): string => (!is_null($record->rating)) ? 'Reviewed' : 'Review')
                    ->disabled(fn (Model $record): bool => !is_null($record->rating))
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render(): View
    {
        return view('livewire.list-perbaikan');
    }
}
