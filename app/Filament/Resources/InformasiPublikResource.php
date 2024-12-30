<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InformasiPublikResource\Pages;
use App\Filament\Resources\InformasiPublikResource\RelationManagers;
use App\Models\InformasiPublik;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InformasiPublikResource extends Resource
{
    protected static ?string $model = InformasiPublik::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Kelola Info Publik';

    protected static ?string $navigationGroup= 'Kelola Index';
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama File')
                    ->required()
                    ->rule('regex:/[a-zA-Z0-9]/')
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->disabled()
                    ->unique(InformasiPublik::class, 'slug', fn ($record) => $record)
                    ->maxLength(255),
                Forms\Components\FileUpload::make('file_path')
                    ->label('Upload PDF')
                    ->required()
                    ->disk('public')
                    ->preserveFilenames(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('file_path')
                    ->searchable(),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInformasiPubliks::route('/'),
            'create' => Pages\CreateInformasiPublik::route('/create'),
            'edit' => Pages\EditInformasiPublik::route('/{record}/edit'),
        ];
    }
}
