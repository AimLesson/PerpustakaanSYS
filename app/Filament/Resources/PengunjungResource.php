<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengunjungResource\Pages;
use App\Models\Pengunjung;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\DatePicker;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class PengunjungResource extends Resource
{
    protected static ?string $model = Pengunjung::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Pengunjung Harian';
    protected static ?string $pluralLabel = 'Pengunjung Harian';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('nim')->required(),
                TextInput::make('nama')->required(),
                TextInput::make('prodi')->required(),
                TextInput::make('keperluan')->required(),
                TextInput::make('kritiksaran')->nullable(),
                Select::make('kategori')
                    ->options([
                        'Dosen' => 'Dosen',
                        'Karyawan' => 'Karyawan',
                        'Mahasiswa' => 'Mahasiswa',
                        'Tamu' => 'Tamu',
                    ])->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('nim')->sortable()->searchable(),
                TextColumn::make('nama')->sortable()->searchable(),
                TextColumn::make('prodi')->sortable(),
                TextColumn::make('keperluan'),
                TextColumn::make('kategori')->sortable(),
                TextColumn::make('created_at')->dateTime()->label('Waktu Kunjungan'),
            ])
            ->filters([
                SelectFilter::make('kategori')
                    ->options([
                        'Dosen' => 'Dosen',
                        'Karyawan' => 'Karyawan',
                        'Mahasiswa' => 'Mahasiswa',
                        'Tamu' => 'Tamu',
                    ]),

                // Filter berdasarkan rentang tanggal
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('start_date')->label('Start Date'),
                        DatePicker::make('end_date')->label('End Date'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['start_date'] ?? null, fn($q) => $q->whereDate('created_at', '>=', $data['start_date']))
                            ->when($data['end_date'] ?? null, fn($q) => $q->whereDate('created_at', '<=', $data['end_date']));
                    }),
            ])
            ->bulkActions([
                ExportBulkAction::make()
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPengunjungs::route('/'),
            'create' => Pages\CreatePengunjung::route('/create'),
            'edit' => Pages\EditPengunjung::route('/{record}/edit'),
        ];
    }
}
