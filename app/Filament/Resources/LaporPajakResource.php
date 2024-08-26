<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LaporPajakResource\Pages;
use App\Filament\Resources\LaporPajakResource\RelationManagers;
use App\Models\LaporPajak;
use App\Models\JenisPajak;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Set;
use Filament\Forms\Get;

class LaporPajakResource extends Resource
{
    protected static ?string $model = LaporPajak::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationLabel = 'Lapor Pajak';
    protected static ?string $pluralModelLabel = 'Lapor Pajak';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('tgl_lapor')
                ->label('Tanggal Lapor (m/d/Y)')
                ->default(now())
                ->readonly(),
                Forms\Components\Select::make('objek_id')
                ->label('Objek Pajak')
                ->relationship(
                    name: 'objek',
                    titleAttribute: 'op_nama',
                    modifyQueryUsing: fn (Builder $query) => $query->where('user_id', auth()->id())->where('op_status', 1)
                ),
                Forms\Components\Select::make('jenis_id')
                ->label('Jenis Pajak')
                ->relationship(
                    name: 'jenis',
                    titleAttribute: 'jp_nama',
                )
                ->afterStateUpdated(function (Set $set, ?string $state) {
                    $set('jml_tarif', JenisPajak::find($state)?->jp_tarif);
                    //$set('pajak', 100000 * $state);
                })
                ->reactive(),
                Forms\Components\TextInput::make('jml_tarif')->readOnly(),
                Forms\Components\TextInput::make('omset_harian')
                ->label('Omset Harian')
                ->live()
                ->reactive()
                ->afterStateUpdated(function ($state, Set $set, Get $get) {
                    $tarif = $get('jml_tarif');
                    $jml_pajak = $state * $tarif;
                    $set('pajak', $jml_pajak);
                }),
                Forms\Components\TextInput::make('pajak')->readOnly(),
                Forms\Components\Textarea::make('keterangan')
                ->label('Keterangan')
                ->rows(4)
                ->cols(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(LaporPajak::where('userinput', auth()->id()))
            ->columns([
                Tables\Columns\TextColumn::make('tgl_lapor')->label('Tanggal Lapor'),
                Tables\Columns\TextColumn::make('objek.op_nama')->label('Objek Pajak'),
                Tables\Columns\TextColumn::make('jenis.jp_nama')->label('Jenis Pajak'),
                Tables\Columns\TextColumn::make('omset_harian')->label('Omset Harian'),
                Tables\Columns\TextColumn::make('pajak')->label('Pajak'),
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
            'index' => Pages\ListLaporPajaks::route('/'),
            'create' => Pages\CreateLaporPajak::route('/create'),
            'edit' => Pages\EditLaporPajak::route('/{record}/edit'),
        ];
    }
}
