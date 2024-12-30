<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HargaPanganResource\Pages;
use App\Filament\Resources\HargaPanganResource\RelationManagers;
use App\Models\HargaPangan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HargaPanganResource extends Resource
{
    protected static ?string $model = HargaPangan::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationGroup= 'Kelola Grafik';
    protected static ?string $navigationLabel = 'Kelola Harga Pangan';

    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('pasar_id')
                ->relationship('pasar', 'name')
                ->required(),

                Forms\Components\Select::make('jenis_pangan_id')
                ->relationship('jenisPangan', 'name')
                ->required(),

                Forms\Components\DatePicker::make('date')
                ->required()
                ->date(),

                Forms\Components\TextInput::make('price')
                ->label('Masukkan Harga Pangan')
                ->required()
            ]);
            
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pasar.name')
                ->label('Nama Pasar')
                ->searchable(),

                Tables\Columns\TextColumn::make('jenisPangan.name')
                ->label('Jenis Pangan')
                ->searchable(),

                Tables\Columns\TextColumn::make('date')
                ->label('Tanggal'),

                Tables\Columns\TextColumn::make('price')
                ->label('Harga Pangan')
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('pasar_id')
                    ->label('Filter Pasar')
                    ->relationship('pasar', 'name'),
    
                Tables\Filters\SelectFilter::make('jenis_pangan_id')
                    ->label('Filter Jenis Pangan')
                    ->relationship('jenisPangan', 'name'),

                Filter::make('date_range')
                    ->label('Rentang Tanggal')
                    ->form([
                        Forms\Components\DatePicker::make('start_date')
                            ->label('Dari Tanggal'),
                        Forms\Components\DatePicker::make('end_date')
                            ->label('Sampai Tanggal'),
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query
                            ->when($data['start_date'], fn($q) =>
                                $q->where('date', '>=', $data['start_date'])
                            )
                            ->when($data['end_date'], fn($q) =>
                                $q->where('date', '<=', $data['end_date'])
                            );
                    })
                    ->indicateUsing(function (array $data): ?string {
                        if ($data['start_date'] && $data['end_date']) {
                            return 'Tanggal: ' . $data['start_date'] . ' - ' . $data['end_date'];
                        }
    
                        if ($data['start_date']) {
                            return 'Mulai dari: ' . $data['start_date'];
                        }
    
                        if ($data['end_date']) {
                            return 'Sampai: ' . $data['end_date'];
                        }
    
                        return null;
                    }),
    
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
            'index' => Pages\ListHargaPangans::route('/'),
            'create' => Pages\CreateHargaPangan::route('/create'),
            'edit' => Pages\EditHargaPangan::route('/{record}/edit'),
        ];
    }
}
