<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Anggota';
    protected static ?string $pluralLabel = 'Anggota';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('email')->required()->email(),
                TextInput::make('password')->password()->required(),
                TextInput::make('nim_nik')->nullable(),
                Select::make('prodi')
                    ->options([
                        'Sistem Informasi' => 'Sistem Informasi',
                        'Teknik Informatika' => 'Teknik Informatika',
                        'Komputerisasi Akuntansi' => 'Komputerisasi Akuntansi',
                        'Desain Komunikasi dan Visual' => 'Desain Komunikasi dan Visual',
                    ])->nullable(),
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
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('email')->sortable()->searchable(),
                TextColumn::make('nim_nik')->sortable(),
                TextColumn::make('prodi')->sortable(),
                TextColumn::make('kategori')->sortable(),
                TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
                SelectFilter::make('kategori')
                    ->options([
                        'Dosen' => 'Dosen',
                        'Karyawan' => 'Karyawan',
                        'Mahasiswa' => 'Mahasiswa',
                        'Tamu' => 'Tamu',
                    ]),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
