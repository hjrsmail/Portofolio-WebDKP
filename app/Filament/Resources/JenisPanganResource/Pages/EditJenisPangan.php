<?php

namespace App\Filament\Resources\JenisPanganResource\Pages;

use App\Filament\Resources\JenisPanganResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJenisPangan extends EditRecord
{
    protected static string $resource = JenisPanganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
