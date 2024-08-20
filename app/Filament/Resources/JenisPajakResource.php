<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JenisPajakResource\Pages;
use App\Filament\Resources\JenisPajakResource\RelationManagers;
use App\Models\JenisPajak;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JenisPajakResource extends Resource
{
    protected static ?string $model = JenisPajak::class;

    protected static ?string $navigationIcon = 'heroicon-o-percent-badge';
    protected static ?string $navigationLabel = 'Jenis Pajak';
    protected static ?string $pluralModelLabel = 'Jenis Pajak';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('jp_nama')
                ->label('Jenis Pajak')
                ->required(),
                Forms\Components\TextInput::make('jp_tarif')
                ->label('Tarif Pajak')
                ->numeric()
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('jp_nama')
            ->label('Jenis Pajak'),
            Tables\Columns\TextColumn::make('jp_tarif')
            ->label('Tarif'),
            Tables\Columns\IconColumn::make('jp_status')
            ->label('Status')
            ->boolean(),
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
            'index' => Pages\ListJenisPajaks::route('/'),
            'create' => Pages\CreateJenisPajak::route('/create'),
            'edit' => Pages\EditJenisPajak::route('/{record}/edit'),
        ];
    }
}
