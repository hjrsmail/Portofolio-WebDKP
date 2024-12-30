<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArchiveResource\Pages;
use App\Models\Archive;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ArchiveResource extends Resource
{
    protected static ?string $model = Archive::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    protected static ?string $navigationLabel = 'Kelola Arsip';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('file_name')
                    ->label('Nama File')    
                    ->required()
                    ->rule('regex:/[a-zA-Z0-9]/')
                    ->maxLength(255),
                Forms\Components\FileUpload::make('file_path')
                    ->label('Upload File')
                    ->required()
                    ->disk('public')
                    ->acceptedFileTypes(['application/pdf', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'])
                    ->preserveFilenames(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('file_name')
                    ->searchable()
                    ->label('Nama File'),
                Tables\Columns\TextColumn::make('file_path')
                    ->searchable()
                    ->label('Dokumen'),
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
                Tables\Filters\SelectFilter::make('timeframe')
                    ->options([
                        'daily' => 'Harian',
                        'monthly' => 'Bulanan',
                        'yearly' => 'Tahunan',
                    ])
                    ->query(function (Builder $query, $data) {
                        // Modifikasi query sesuai periode yang dipilih
                        if ($data === 'daily') {
                            return $query->whereDate('created_at', now()->format('Y-m-d'));
                        } elseif ($data === 'monthly') {
                            return $query->whereMonth('created_at', now()->month)
                                         ->whereYear('created_at', now()->year);
                        } elseif ($data === 'yearly') {
                            return $query->whereYear('created_at', now()->year);
                        }
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make('download')
                    ->label('Unduh')
                    ->url(fn ($record) => asset('storage/' . $record->file_path)) // Tautan untuk mengunduh file
                    ->icon('heroicon-o-arrow-down-tray')
                    ->openUrlInNewTab(),
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
            'index' => Pages\ListArchives::route('/'),
            'create' => Pages\CreateArchive::route('/create'),
            'edit' => Pages\EditArchive::route('/{record}/edit'),
        ];
    }
}
