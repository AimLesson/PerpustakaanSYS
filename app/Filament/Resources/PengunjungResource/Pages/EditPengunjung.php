<?php

namespace App\Filament\Resources\PengunjungResource\Pages;

use App\Filament\Resources\PengunjungResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPengunjung extends EditRecord
{
    protected static string $resource = PengunjungResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
