<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ObjekPajakResource\Pages;
use App\Filament\Resources\ObjekPajakResource\RelationManagers;
use App\Models\ObjekPajak;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Model;

class ObjekPajakResource extends Resource
{
    protected static ?string $model = ObjekPajak::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationLabel = 'Objek Pajak';
    protected static ?string $pluralModelLabel = 'Objek Pajak';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('op_nama')
            ->label('Nama Objek'),
            Forms\Components\TextInput::make('op_pengelola')
            ->label('Pengelola'),
            Forms\Components\TextInput::make('nohp_pengelola')
            ->label('Nohp Pengelola'),
            Forms\Components\Textarea::make('op_alamat')
            ->label('Alamat Objek'),
            Forms\Components\Select::make('user_id')
            ->label('Pemilik')
            ->relationship(
                name: 'user',
                titleAttribute: 'name',
                modifyQueryUsing: fn (Builder $query) => $query->where('role', 'wp'),
            ),
            Forms\Components\Select::make('jp_id')
                ->label('Jenis Pajak')
                ->relationship(
                    name: 'jp',
                    titleAttribute: 'jp_nama'
                )
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('op_nama')
                ->label('Nama Objek'),
                Tables\Columns\TextColumn::make('op_pengelola')
                ->label('Pengelola'),
                Tables\Columns\TextColumn::make('op_alamat')
                ->label('Alamat'),
                Tables\Columns\TextColumn::make('user.name')
                ->label('Pemilik'),
                Tables\Columns\TextColumn::make('jp.jp_nama')
                ->label('Jenis'),
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
            'index' => Pages\ListObjekPajaks::route('/'),
            'create' => Pages\CreateObjekPajak::route('/create'),
            'edit' => Pages\EditObjekPajak::route('/{record}/edit'),
        ];
    }
}
