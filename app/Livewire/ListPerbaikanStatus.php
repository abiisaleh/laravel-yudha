<?php

namespace App\Livewire;

use App\Models\Perbaikan;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Infolists\Components\Actions\Action as ActionsAction;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Notifications\Notification;
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
use Illuminate\Support\HtmlString;
use Livewire\Component;

class ListPerbaikanStatus extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Perbaikan::query()->whereHas('user', fn (Builder $query) => $query->where('user_id', auth()->id()))->has('detail')->where('rating', null))
            ->columns([
                TextColumn::make('created_at')
                    ->date('d/m/yy')
                    ->label('Dikirim'),
                TextColumn::make('toko.nama'),
                TextColumn::make('biaya')
                    ->numeric()
                    ->prefix('Rp. '),
                IconColumn::make('lunas')
                    ->boolean(),
                IconColumn::make('selesai')
                    ->boolean(),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make('View')
                    ->icon('heroicon-m-eye')
                    ->color('gray')
                    ->form([
                        Grid::make()
                            ->schema([
                                Placeholder::make('toko')
                                    ->content(fn (Perbaikan $record) => $record->toko()->first()->nama . ', ' . $record->toko()->first()->alamat),
                                Placeholder::make('detail_kerusakan')
                                    ->content(fn (Perbaikan $record) => $record->detail_kerusakan),
                                Placeholder::make('perbaikan_komponen')
                                    ->content(function (Perbaikan $record) {
                                        $html = '';
                                        foreach ($record->detail as $detail) {
$harga = number_format($detail->harga);
$total = number_format($detail->total);
                                            $html .= $detail->qty . "x $detail->perbaikan (Rp. $harga) = Rp. $total<br>";
                                        }

                                        return new HtmlString($html);
                                    }),
                            ]),
                        Grid::make()
                            ->schema([
                                Placeholder::make('biaya')
                                    ->content(fn (Perbaikan $record) => 'Rp. ' . number_format($record->biaya)),
                                Placeholder::make('hasil_pemeriksaan')
                                    ->content(fn (Perbaikan $record) => $record->hasil_pemeriksaan),
                                Radio::make('setuju')
                                    ->boolean(),
                            ]),
                    ])
                    ->label('View'),
                EditAction::make('Review')
                    ->icon('heroicon-m-star')
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
