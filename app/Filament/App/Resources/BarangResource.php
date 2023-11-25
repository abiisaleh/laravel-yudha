<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\BarangResource\Pages;
use App\Filament\Resources\BarangResource\RelationManagers;
use App\Models\Barang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BarangResource extends Resource
{
    protected static ?string $model = Barang::class;

    protected static ?string $navigationIcon = 'heroicon-o-cpu-chip';

    protected static ?string $pluralLabel = 'Komponen';

    // protected static ?string $navigationGroup = 'Distributor';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('gambar')
                    ->required()
                    ->columnSpanFull()
                    ->imageCropAspectRatio('1:1')
                    ->previewable(),
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('harga')
                    ->required()
                    ->prefix('Rp')
                    ->numeric(),
                Forms\Components\Textarea::make('deskripsi')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        if (auth()->user()->role == 'teknisi') {
            return $table
                ->query(Barang::query())
                ->columns([
                    Tables\Columns\ImageColumn::make('gambar')
                        ->circular(),
                    Tables\Columns\TextColumn::make('nama')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('harga')
                        ->numeric()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('toko.nama')
                        ->searchable(),
                ])
                ->filters([
                    //
                ])
                ->actions([
                    Tables\Actions\EditAction::make(),
                ])
                ->bulkActions([
                    Tables\Actions\BulkActionGroup::make([
                        Tables\Actions\DeleteBulkAction::make(),
                    ]),
                ]);
        } else {
            return $table
                ->columns([
                    Tables\Columns\ImageColumn::make('gambar')
                        ->circular(),
                    Tables\Columns\TextColumn::make('nama')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('harga')
                        ->numeric()
                        ->sortable(),
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
                ])
                ->bulkActions([
                    Tables\Actions\BulkActionGroup::make([
                        Tables\Actions\DeleteBulkAction::make(),
                    ]),
                ]);
        }
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBarangs::route('/'),
            'create' => Pages\CreateBarang::route('/create'),
            'edit' => Pages\EditBarang::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return auth()->user()->role == 'distributor';
    }

    public static function canEdit(Model $record): bool
    {
        return auth()->user()->role == 'distributor';
    }

    public static function canDelete(Model $record): bool
    {
        return auth()->user()->role == 'distributor';
    }

    public static function canDeleteAny(): bool
    {
        return auth()->user()->role == 'distributor';
    }
}
