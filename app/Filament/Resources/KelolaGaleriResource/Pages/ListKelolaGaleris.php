<?php

namespace App\Filament\Resources\KelolaGaleriResource\Pages;

use App\Filament\Resources\KelolaGaleriResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKelolaGaleris extends ListRecords
{
    protected static string $resource = KelolaGaleriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
