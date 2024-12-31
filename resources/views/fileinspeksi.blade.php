<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Simavent - Diskominfo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('Image/logo_bnn.png')}}" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>

            @page {
                size: 20.5cm 29.2cm;
            }

            body {
                width: auto;
                height: auto;
                font-family: Arial;
            }

            #judul{
                text-align:center;
            }

            #halaman{
                position: absolute;
                padding-left: 30px; 
                padding-right: 10px;
                padding-bottom: 2rem;
                font-size: 12pt;
                text-align: justify;
                margin-top: 2rem;
            }
            
            .container {
            }

            .tab {
                display: inline-block;
                margin-left: 10px;
            }

            .tab1 {
                display: inline-block;
            }

            .tab2 {
                display: inline-block;
                margin-left: 22.5px;
            }
        </style>

</head>

<body onload="window.print();">
    <div id=halaman>
        <div id="judul" style="margin-bottom: 2rem;">
            <table style="border-bottom: 3px double; width: 100%;">
                <tr>
                    <td rowspan="5" style="width: 100px; padding-right: 15px;"><img src="{{asset('Image/logosmall.png')}}" alt="" style="width: 100px; height: 100px;"><br>
                    </td>
                    <td style="padding-bottom: 10px; font-size: 10pt; text-align: center;"><b style="font-size: 12pt">PEMERINTAH KABUPATEN KERINCI</b><br>
                        <b style="font-size: 12pt">DINAS KOMUNIKASI DAN INFORMATIKA</b><br>
                        Komplek Perkantoran Bukit Tengah<br>
                        SIULAK - 37162<br>
                    </td>
                </tr>
            </table>
        </div>
        <p style="text-align: center;">BERITA ACARA<br>LAPORAN INSPEKSI KONDISI BARANG</p>
        <p style="margin-bottom: 1rem; font-size:11pt">Pada hari {{ \Carbon\Carbon::now()->translatedFormat('l') }} Tanggal {{ \Carbon\Carbon::now()->translatedFormat('d') }} 
            Bulan {{ \Carbon\Carbon::now()->translatedFormat('F') }} Tahun {{ \Carbon\Carbon::now()->translatedFormat('Y') }} telah dilakukan inspeksi kondisi aset oleh 
            {{ $inspeksi->Auditors->employee_name ?? 'Admin' }} sebagai Administrator sistem kepada {{ $inspeksi->Sender->employee_name }} 
            sebagai pemegang aset dengan detail aset sebagai berikut:
        </p>
        <table style="width: 100%; font-size:11pt; border-collapse: collapse;">
            <tr>
                <td style="width: 5%; border: 1px solid; padding: 5px;">1</td>
                <td style="width: 40%; border: 1px solid; padding: 5px;">Kode Aset</td>
                <td style="width: 55%; border: 1px solid; padding: 5px;">{{ $inspeksi->dataAset->id_asset }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid; padding: 5px;">2</td>
                <td style="border: 1px solid; padding: 5px;">Nama Aset</td>
                <td style="border: 1px solid; padding: 5px;">{{ $inspeksi->dataAset->asset_name }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid; padding: 5px;">3</td>
                <td style="border: 1px solid; padding: 5px;">Laporan Periode</td>
                <td style="border: 1px solid; padding: 5px;">{{ \Carbon\Carbon::createFromDate($inspeksi->year, $inspeksi->month, 1)->translatedFormat('F') }} {{ $inspeksi->year }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid; padding: 5px;">4</td>
                <td style="border: 1px solid; padding: 5px;">Kondisi Aset</td>
                <td style="border: 1px solid; padding: 5px;">{{ $inspeksi->conditions }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid; padding: 5px;">5</td>
                <td style="border: 1px solid; padding: 5px;">Catatan</td>
                <td style="border: 1px solid; padding: 5px;">{{ $inspeksi->message }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid; padding: 5px;">6</td>
                <td style="border: 1px solid; padding: 5px;">Pesan Balasan</td>
                <td style="border: 1px solid; padding: 5px;">{{ $inspeksi->reply_message }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid; padding: 5px;">7</td>
                <td style="border: 1px solid; padding: 5px;">Waktu Pengajuan Laporan</td>
                <td style="border: 1px solid; padding: 5px;">{{ $inspeksi->created_at->translatedFormat('d F Y, H:i:s') }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid; padding: 5px;">8</td>
                <td style="border: 1px solid; padding: 5px;">Waktu Laporan Divalidasi</td>
                <td style="border: 1px solid; padding: 5px;">{{ $inspeksi->validate_time ? $inspeksi->validate_time->translatedFormat('d F Y, H:i:s') : '' }}</td>
            </tr>
            <tr style="height: 80px;">
                <td colspan="3" style="border: 1px solid; padding: 5px; vertical-align: top;">Gambar Kondisi Aset: <br>
                    @foreach(json_decode($inspeksi->attachment) as $Attachment)
                        <img src="{{ asset('Image/Kondisi Aset/' . $Attachment) }}" alt="Gambar Kondisi Aset" style="height: 150px; width:150px;">
                    @endforeach
                </td>
            </tr>
            <tr style="height: 150px;">
                <td colspan="3" style="border: none; padding: 5px;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <tr>
                            <td style="border: none; padding: 5px;"></td>
                            <td style="border: none; padding: 5px; text-align: center; padding-top: 20px;">Jambi, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</td>
                        </tr>
                        <tr>
                            <td style="width: 50%; border: none; padding: 5px; text-align: center;">
                                Administrator: <br><br><br><br><br>
                                <b>{{ $inspeksi->Auditors->employee_name ?? 'Admin' }}</b><br>
                                {{ $inspeksi->Auditors->nip ?? 'NIP' }}
                            </td>
                            <td style="width: 50%; border: none; padding: 5px; text-align: center;">
                                Penanggung Jawab Aset: <br><br><br><br><br>
                                <b>{{ $inspeksi->Sender->employee_name }}</b><br>
                                {{ $inspeksi->Sender->nip }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>        
    </div>
</body>

</html> 