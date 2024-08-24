<?php

namespace App\Filament\Pages;

use App\Http\Controllers\CetakOmsetController;
use App\Models\LaporanOmset;
use Filament\Pages\Page;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Actions\Action;
use Illuminate\Support\Facades\Auth;

class CetakLaporan extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-printer';

    protected static string $view = 'filament.pages.cetak-laporan';

    //protected static bool $isDiscovered = false;

    public $periode = '';
    public $objekpajak = '';
 
    public function mount(): void
    {
        $this->form->fill();
    }

    public function getFormSchema(): array
    {
        return [
            Card::make()
            ->schema([
                Select::make('periode')
                ->label('Periode')
                ->options(LaporanOmset::where('userinput', Auth::id())->pluck('periode', 'periode'))
                ->columnSpan(1),
                Select::make('objekpajak')
                ->label('Objek Pajak')
                ->options(LaporanOmset::where('userinput', Auth::id())->pluck('op_nama', 'objek_id'))
                ->columnSpan(1),
            ])
            ->columns(3)
        ];
    }

    public function cetak() 
    {
        $data = [
            'periode' => $this->periode,
            'objekpajak' => $this->objekpajak,
            'userinput' => auth()->id()
        ];

        return redirect()->action([CetakOmsetController::class, 'cetaklaporan'], ['data' => $data]);
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('cetak')
            ->label('Cetak')
            ->submit('cetak')
        ];
    }
}
