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
        <p style="font-size: 20px">PEMERINTAH KOTA PROBOLINGGO</p>
        <p style="font-size: 16px">BADAN PENDAPATAN, PENGELOLAAN KEUANGAN, DAN ASET DAERAH</p>
        <p style="font-size: 14px">Jalan Panglima Sudirman No.19 Telp. (0335) 436437 Kodepos 67213</p>
    </div>
    <hr>
    <br><br>
    <div>
        <table style="font-size: 10pt; width: 100%">
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
                <th>OMSET HARIAN</th>
                <th>PAJAK</th>
            </tr>
            @php $total = 0; @endphp
            @foreach($laporan as $rprt)
            <tr>
                <td>{{ $rprt->tgl_lapor }}</td>
                <td>{{ number_format($rprt->omset_harian) }}</td>
                <td>{{ number_format($rprt->pajak) }}</td>
            </tr>
            @php $total += $rprt->pajak @endphp
            @endforeach
            <tfoot class="footer">
                <tr>
                    <td colspan="2">Total Pajak</td>
                    <td>{{ number_format($total) }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>