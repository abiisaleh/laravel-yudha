<?php

namespace App\Livewire;

use App\Models\Perbaikan;
use Filament\Forms\Components\Textarea;
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
use IbrahimBougaoua\FilamentRatingStar\Actions\RatingStar;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class ListPerbaikanStatus extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Perbaikan::query()->whereHas('user', fn (Builder $query) => $query->where('user_id', auth()->id()))->where('biaya', '!=', null)->where('rating', null))
            ->columns([
                TextColumn::make('created_at')
                    ->date('d/m/yy')
                    ->label('Dikirim'),
                TextColumn::make('toko.nama'),
                IconColumn::make('lunas')
                    ->boolean(),
                IconColumn::make('selesai')
                    ->boolean(),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make('Review')
                    ->icon(null)
                    ->form([
                        RatingStar::make('rating'),
                        Textarea::make('comment'),
                    ])
                    ->label('Review')
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.list-perbaikan-status');
    }
}
