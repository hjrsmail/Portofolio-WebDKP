<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JenisPanganResource\Pages;
use App\Filament\Resources\JenisPanganResource\RelationManagers;
use App\Models\JenisPangan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JenisPanganResource extends Resource
{
    protected static ?string $model = JenisPangan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup= 'Kelola Grafik';
    protected static ?string $navigationLabel = 'Kelola Jenis Pangan';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('name')
            ->label('Tambah Jenis Pangan')
            ->rule('regex:/[a-zA-Z0-9]/')
            ->required(),
            Forms\Components\Select::make('unit')
            ->label('Masukkan Satuan')
            ->options([
                'Kg' => 'Kilogram',
                'Ikat' => 'Ikat',
                'Liter' => 'Liter',
                'Kaleng' => 'Kaleng',
                'Buah' => 'Buah',
                'Potong' => 'Potong',
            ])
            ->rule('regex:/[a-zA-Z0-9]/')
            ->required(),
            
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label('Daftar Jenis Pangan')
                ->searchable(),
                Tables\Columns\TextColumn::make('unit')
                ->label('Satuan')
                ->searchable()
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
            'index' => Pages\ListJenisPangans::route('/'),
            'create' => Pages\CreateJenisPangan::route('/create'),
            'edit' => Pages\EditJenisPangan::route('/{record}/edit'),
        ];
    }
}
