<?php

namespace App\Livewire;

use App\Models\Perbaikan;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class ListPerbaikan extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Perbaikan::query()->whereHas('user', fn (Builder $query) => $query->where('user_id', auth()->id()))->where('biaya', null))
            ->columns([
                TextColumn::make('created_at')
                    ->date('d/m/yy')
                    ->label('Dikirim'),
                TextColumn::make('toko.nama'),
                TextColumn::make('detail_kerusakan')
                    ->limit(30),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make()
                    ->form([
                        TextInput::make('email'),
                        FileUpload::make('gambar'),
                        Textarea::make('detail_kerusakan')
                            ->required()
                            ->maxLength(255),
                    ]),
                DeleteAction::make()
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
