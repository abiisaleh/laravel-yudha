<?php

namespace App\Livewire;

use App\Models\Perbaikan;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use IbrahimBougaoua\FilamentRatingStar\Actions\RatingStar;
use IbrahimBougaoua\FilamentRatingStar\Columns\RatingStarColumn;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Mastani\GoogleStaticMap\Size;

class RiwayatPerbaikan extends Component implements HasForms, HasInfolists, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    use InteractsWithInfolists;

    public function table(Table $table): Table
    {
        return $table
            ->query(Perbaikan::query()->whereHas('user', fn (Builder $query) => $query->where('user_id', auth()->id()))->where('rating', '!=', null))
            ->columns([
                TextColumn::make('created_at')
                    ->date('d M Y')
                    ->label('Dikirim')
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->date('d M Y')
                    ->label('Selesai'),
                TextColumn::make('toko.nama'),
                TextColumn::make('biaya')
                    ->numeric()
                    ->prefix('Rp '),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                ViewAction::make()
                    ->infolist([
                        Grid::make(2)
                            ->schema([
                                Grid::make(1)
                                    ->schema([
                                        ImageEntry::make('gambar'),
                                        TextEntry::make('detail_kerusakan'),
                                        TextEntry::make('biaya')->numeric()->prefix('Rp ')->size(Size::Large)->weight(FontWeight::Bold)->columnSpanFull(),

                                    ])->columnSpan(1),
                                Grid::make(1)
                                    ->schema([
                                        TextEntry::make('created_at')->label('Dikirim')->icon('heroicon-m-calendar'),
                                        TextEntry::make('updated_at')->label('Selsai')->icon('heroicon-m-calendar-days'),
                                    ])->columnSpan(1),
                            ])->columnSpan(2),

                        Grid::make()
                            ->schema([
                                TextEntry::make('toko.nama'),
                                TextEntry::make('toko.alamat')->label('Alamat')->icon('heroicon-m-map-pin'),
                            ])->columnSpan(2),

                        Grid::make()->schema([
                            TextEntry::make('rating')->color('primary')->icon('heroicon-m-star')->iconColor('primary')->badge(),
                            TextEntry::make('comment'),
                        ])->columnSpan(2),
                    ])
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.riwayat-perbaikan');
    }
}
