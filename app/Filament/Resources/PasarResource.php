<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PasarResource\Pages;
use App\Filament\Resources\PasarResource\RelationManagers;
use App\Models\Pasar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PasarResource extends Resource
{
    protected static ?string $model = Pasar::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationGroup= 'Kelola Grafik';
    protected static ?string $navigationLabel = 'Kelola Pasar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->label('Tambah Nama Pasar')
                ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label('Daftar Nama Pasar')
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
            'index' => Pages\ListPasars::route('/'),
            'create' => Pages\CreatePasar::route('/create'),
            'edit' => Pages\EditPasar::route('/{record}/edit'),
        ];
    }
}
