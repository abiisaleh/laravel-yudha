<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\PerbaikanResource\Pages;
use App\Filament\App\Resources\PerbaikanResource\RelationManagers\DetailRelationManager;
use App\Filament\Resources\PerbaikanResource\RelationManagers;
use App\Models\Perbaikan;
use App\Models\PerbaikanDetail;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\DB;

class PerbaikanResource extends Resource
{
    protected static ?string $model = Perbaikan::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    protected static ?string $pluralLabel = 'Perbaikan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->disabledOn('edit'),
                Forms\Components\FileUpload::make('gambar')
                    ->image()
                    ->disabledOn('edit'),
                Forms\Components\Textarea::make('detail_kerusakan')
                    ->required()
                    ->disabledOn('edit'),
                Forms\Components\Textarea::make('hasil_pemeriksaan')
                    ->required()
                    ->hiddenOn('create')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('email')
                    ->copyable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('detail_kerusakan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('biaya')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('setuju')
                    ->boolean(),
                Tables\Columns\ToggleColumn::make('lunas')
                    ->afterStateUpdated(function (Perbaikan $record) {
                        $recipient = $record->user()->get();

                        Notification::make()
                            ->success()
                            ->title('Pembayaran lunas')
                            ->sendToDatabase($recipient);
                    })
                    ->disabled(fn (Perbaikan $record) => !$record->setuju),
                Tables\Columns\ToggleColumn::make('selesai')
                    ->afterStateUpdated(function (Perbaikan $record) {
                        $recipient = $record->user()->get();

                        Notification::make()
                            ->success()
                            ->title('Perbaikan telah selesai')
                            ->sendToDatabase($recipient);
                    })
                    ->disabled(fn (Perbaikan $record) => !$record->setuju),
                Tables\Columns\TextColumn::make('created_at')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPerbaikans::route('/'),
            'create' => Pages\CreatePerbaikan::route('/create'),
            'edit' => Pages\EditPerbaikan::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()->role == 'teknisi';
    }

    public static function getNavigationBadge(): ?string
    {
        $dataCount = static::getModel()::where('toko_id', Filament::getTenant()->id)->where('selesai', false)->count();

        if ($dataCount == 0)
            return null;

        return $dataCount;
    }

    public static function getRelations(): array
    {
        return [
            DetailRelationManager::class,
        ];
    }
}
