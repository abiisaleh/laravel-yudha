<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PerbaikanResource\Pages;
use App\Filament\Resources\PerbaikanResource\RelationManagers;
use App\Models\Perbaikan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                Forms\Components\TextInput::make('biaya')
                    ->numeric()
                    ->required(),
                Forms\Components\FileUpload::make('gambar')
                    ->required()
                    ->image()
                    ->disabledOn('edit'),
                Forms\Components\Textarea::make('detail_kerusakan')
                    ->required()
                    ->disabledOn('edit'),
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
                Tables\Columns\ToggleColumn::make('lunas'),
                Tables\Columns\ToggleColumn::make('selesai'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
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
            'index' => Pages\ManagePerbaikans::route('/'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()->role == 'teknisi';
    }
}
