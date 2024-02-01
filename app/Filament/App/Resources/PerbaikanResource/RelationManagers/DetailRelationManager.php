<?php

namespace App\Filament\App\Resources\PerbaikanResource\RelationManagers;

use App\Models\PerbaikanDetail;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\Summarizers\Summarizer;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\DB;

class DetailRelationManager extends RelationManager
{
    protected static string $relationship = 'detail';

    protected static ?string $label = 'perbaikan komponen';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('perbaikan')
                    ->columnSpanFull()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('harga')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('qty')
                    ->numeric()
                    ->minValue(1)
                    ->default(1)
                    ->maxValue(100)
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('perbaikan')
            ->columns([
                Tables\Columns\TextColumn::make('qty'),
                Tables\Columns\TextColumn::make('perbaikan'),
                Tables\Columns\TextColumn::make('harga')
                    ->numeric(),
                Tables\Columns\TextColumn::make('total')
                    ->label('Jumlah')
                    ->numeric()
                    ->summarize(Sum::make()->label('Total')),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
