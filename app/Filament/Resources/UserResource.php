<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Pengguna';
    protected static ?string $pluralModelLabel = 'Pengguna';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('npwpd')
                ->label('NPWPD'),
                Forms\Components\TextInput::make('nik')
                ->label('NIK'),
                Forms\Components\TextInput::make('name')
                ->label('Nama Lengkap')
                ->required(),
                Forms\Components\Textarea::make('alamat_lengkap')
                ->rows(4)
                ->cols(2)
                ->label('Alamat')
                ->required(),
                Forms\Components\TextInput::make('kota_asal')
                ->label('Kota'),
                Forms\Components\TextInput::make('email')
                ->label('Email')
                ->email()
                ->required(),
                Forms\Components\TextInput::make('password')
                ->password()
                ->revealable()
                ->required(fn (string $context): bool => $context === 'create')
                ->dehydrated(fn ($state) => filled($state))
                ->label('Password')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('npwpd')
                ->label('NPWPD'),
                Tables\Columns\TextColumn::make('nik')
                ->label('NIK'),
                Tables\Columns\TextColumn::make('name')
                ->label('Nama'),
                Tables\Columns\TextColumn::make('alamat_lengkap')
                ->label('Alamat'),
                Tables\Columns\TextColumn::make('email')
                ->label('Email'),
                Tables\Columns\TextColumn::make('role')
                ->label('Role')
            ])
            ->filters([
                //
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
