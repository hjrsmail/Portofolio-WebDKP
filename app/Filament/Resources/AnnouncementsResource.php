<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnnouncementsResource\Pages;
use App\Filament\Resources\AnnouncementsResource\RelationManagers;
use App\Models\Announcements;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AnnouncementsResource extends Resource
{
    protected static ?string $model = Announcements::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';

    protected static ?string $navigationGroup= 'Kelola Index';

    protected static ?string $navigationLabel = 'Kelola Pengumuman';

    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->rule('regex:/[a-zA-Z0-9]/')
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->disabled() // Nonaktifkan input agar slug dihasilkan otomatis
                    ->unique(Announcements::class, 'slug', ignoreRecord: true),
                Forms\Components\RichEditor::make('description')
                    ->columnSpanFull()
                    ->rule('regex:/[a-zA-Z0-9]/'),
                Forms\Components\DatePicker::make('publication_date')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('publication_date')
                    ->date()
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAnnouncements::route('/'),
            'create' => Pages\CreateAnnouncements::route('/create'),
            'edit' => Pages\EditAnnouncements::route('/{record}/edit'),
        ];
    }
}
