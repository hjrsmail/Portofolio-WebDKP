<?php

namespace App\Filament\Resources\HargaPanganResource\Pages;

use App\Filament\Resources\HargaPanganResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHargaPangans extends ListRecords
{
    protected static string $resource = HargaPanganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
