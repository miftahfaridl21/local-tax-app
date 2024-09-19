<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Omset</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        .header, .footer {
            text-align: center;
        }
        .content {
            margin-top: 20px;
        }
        .details {
            width: 100%;
            border-collapse: collapse;
            font-size: 7pt;
        }
        .details th, .details td {
            border: 1px solid #000;
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="header">
        <table>
            <tr>
                <td width="40%">
                    <img src="assets/images/pemkot.png" width="90" height="100" />
                </td>
                <td width="20">&nbsp;</td>
                <td class="header" width="40%">
                    <p style="font-size: 18px">PEMERINTAH KOTA PROBOLINGGO</p>
                    <p style="font-size: 16px">BADAN PENDAPATAN, PENGELOLAAN KEUANGAN, DAN ASET DAERAH</p>
                    <p style="font-size: 12px">Jalan Panglima Sudirman No.19 Telp. (0335) 436437 Kode pos 67213</p>
                </td>
            </tr>
        </table>
        
    </div>
    <hr>
    <div>
        <table style="font-size: 9pt; width: 100%">
            <tr>
                <td style="width: 20%">Jenis Pajak</td>
                <td style="align-items: center; width: 5%">:</td>
                <td style="width: 80%">{{ $jenispajak }}</td>
            </tr>
            <tr>
                <td style="width: 20%">Objek Pajak</td>
                <td style="align-items: center; width: 5%">:</td>
                <td style="width: 80%">{{ $objekpajak }}</td>
            </tr>
            <tr>
                <td style="width: 20%">NPWPD</td>
                <td style="align-items: center; width: 5%">:</td>
                <td style="width: 80%">{{ $npwpd }}</td>
            </tr>
            <tr>
                <td style="width: 20%">Alamat</td>
                <td style="align-items: center; width: 5%">:</td>
                <td style="width: 80%">{{ $alamat }}</td>
            </tr>
        </table>
    </div>
    <div class="content">
        <table class="details">
            <tr>
                <th>TGL LAPOR</th>
                <th style="text-align:right">OMSET HARIAN (Rp)</th>
                <th style="text-align:right">PAJAK (Rp)</th>
            </tr>
            @php $total = 0; @endphp
            @foreach($laporan as $rprt)
            <tr>
                <td>{{ $rprt->tgl_lapor }}</td>
                <td style="text-align:right">{{ number_format($rprt->omset_harian) }}</td>
                <td style="text-align:right">{{ number_format($rprt->pajak) }}</td>
            </tr>
            @php $total += $rprt->pajak @endphp
            @endforeach
            <tfoot class="footer">
                <tr>
                    <td colspan="2">Total Pajak</td>
                    <td style="text-align:right; font-weight: bold">{{ number_format($total) }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>