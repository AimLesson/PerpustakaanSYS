<?php

namespace App\Filament\Resources\PengunjungResource\Pages;

use App\Filament\Resources\PengunjungResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Table;
use App\Filament\Resources\UserResource;

class ListPengunjungs extends ListRecords
{
    protected static string $resource = PengunjungResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }

    protected function makeTable(): Table
    {
        return parent::makeTable()->recordUrl(null);
    }
}
