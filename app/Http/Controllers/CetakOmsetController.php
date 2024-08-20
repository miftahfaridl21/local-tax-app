<?php

namespace App\Http\Controllers;

use App\Models\LaporanOmset;
use Illuminate\Http\Request;
use PDF;

class CetakOmsetController extends Controller
{
    public function cetaklaporan(Request $request)
    {
        $periode = $request->data['periode'];
        $objekpajak = $request->data['objekpajak'];
        $user = $request->data['userinput'];

        $kriteria = ['periode' => $periode, 'objek_id' => $objekpajak, 'userinput' => $user];
        $laporan = LaporanOmset::where($kriteria)->get();
        $wp = LaporanOmset::select('npwpd', 'op_nama', 'jp_nama', 'op_alamat')->where($kriteria)->distinct()->get();

        foreach($wp as $info) {
            $np = $info['npwpd'];
            $ob = $info['op_nama'];
            $js = $info['jp_nama'];
            $al = $info['op_alamat'];
        }

        $data = [
            'title' => 'Laporan Pajak',
            'jenispajak' => $js,
            'objekpajak' => $ob,
            'npwpd' => $np,
            'alamat' => $al,
            'laporan' => $laporan
        ];

        $pdf = PDF::loadView('laporan-omset', $data);

        return $pdf->download('laporan-omset.pdf');
    }
}
