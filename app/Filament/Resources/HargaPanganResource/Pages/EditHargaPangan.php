<?php

namespace App\Filament\Resources\HargaPanganResource\Pages;

use App\Filament\Resources\HargaPanganResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHargaPangan extends EditRecord
{
    protected static string $resource = HargaPanganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
