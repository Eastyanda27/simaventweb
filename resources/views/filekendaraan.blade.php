<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Simavent - Diskominfo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('Image/logo_bnn.png') }}" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        @page {
            size: 20.5cm 29.2cm;
        }

        body {
            width: 100%;
            height: auto;
            font-family: Arial, sans-serif;
        }

        #judul {
            text-align: center;
            margin-bottom: 2rem;
        }

        #halaman {
            position: absolute;
            padding-left: 30px;
            padding-right: 10px;
            padding-bottom: 2rem;
            font-size: 12pt;
            text-align: justify;
            margin-top: 2rem;
            width: 100%;
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
    <div id="halaman">
        <div id="judul">
            <table style="border-bottom: 3px double; width: 100%;">
                <tr>
                    <td rowspan="5" style="width: 100px; padding-right: 15px;">
                        <img src="{{ asset('Image/logosmall.png') }}" alt="Logo" style="width: 100px; height: 100px;">
                    </td>
                    <td style="padding-bottom: 10px; font-size: 10pt; text-align: center; width: 100%;">
                        <b style="font-size: 12pt;">PEMERINTAH KABUPATEN KERINCI</b><br>
                        <b style="font-size: 12pt;">DINAS KOMUNIKASI DAN INFORMATIKA</b><br>
                        Komplek Perkantoran Bukit Tengah<br>
                        SIULAK - 37162<br>
                    </td>
                </tr>
            </table>
        </div>
        <p style="text-align: center;">LAPORAN DETAIL BARANG INVENTARIS</p>
        <table style="width: 100%; font-size:11pt; border-collapse: collapse;">
            @foreach($vehicle as $Vehicle)
                <tr>
                    <td colspan="3" style="border: 1px solid; padding: 5px; vertical-align: top;">Detail Data Aset:</td>
                </tr>
                <tr>
                    <td style="width: 5%; border: 1px solid; padding: 5px;">1</td>
                    <td style="width: 40%; border: 1px solid; padding: 5px;">Kode Aset</td>
                    <td style="width: 55%; border: 1px solid; padding: 5px;">{{ $Vehicle->id_asset }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid; padding: 5px;">2</td>
                    <td style="border: 1px solid; padding: 5px;">Nama Aset</td>
                    <td style="border: 1px solid; padding: 5px;">{{ $Vehicle->asset_name }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid; padding: 5px;">3</td>
                    <td style="border: 1px solid; padding: 5px;">Kategori</td>
                    <td style="border: 1px solid; padding: 5px;">{{ ucwords($Vehicle->jenisAset->asset_category) }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid; padding: 5px;">4</td>
                    <td style="border: 1px solid; padding: 5px;">Sub-Kategori</td>
                    <td style="border: 1px solid; padding: 5px;">{{ $Vehicle->jenisAset->sub_category }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid; padding: 5px;">5</td>
                    <td style="border: 1px solid; padding: 5px;">Nomor Plat</td>
                    <td style="border: 1px solid; padding: 5px;">{{ $Vehicle->number_plate }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid; padding: 5px;">6</td>
                    <td style="border: 1px solid; padding: 5px;">Merk Kendaraan</td>
                    <td style="border: 1px solid; padding: 5px;">{{ $Vehicle->brand }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid; padding: 5px;">7</td>
                    <td style="border: 1px solid; padding: 5px;">Tipe Kendaraan</td>
                    <td style="border: 1px solid; padding: 5px;">{{ $Vehicle->type }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid; padding: 5px;">8</td>
                    <td style="border: 1px solid; padding: 5px;">Ukuran CC</td>
                    <td style="border: 1px solid; padding: 5px;">{{ $Vehicle->cc_size }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid; padding: 5px;">9</td>
                    <td style="border: 1px solid; padding: 5px;">Nomor Rangka</td>
                    <td style="border: 1px solid; padding: 5px;">{{ $Vehicle->frame_number }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid; padding: 5px;">10</td>
                    <td style="border: 1px solid; padding: 5px;">Nomor Mesin</td>
                    <td style="border: 1px solid; padding: 5px;">{{ $Vehicle->machine_number }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid; padding: 5px;">11</td>
                    <td style="border: 1px solid; padding: 5px;">Nomor BPKB</td>
                    <td style="border: 1px solid; padding: 5px;">{{ $Vehicle->bpkb_number }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid; padding: 5px;">12</td>
                    <td style="border: 1px solid; padding: 5px;">Warna</td>
                    <td style="border: 1px solid; padding: 5px;">{{ $Vehicle->color }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid; padding: 5px;">13</td>
                    <td style="border: 1px solid; padding: 5px;">Tahun Produksi</td>
                    <td style="border: 1px solid; padding: 5px;">{{ $Vehicle->production_year }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid; padding: 5px;">14</td>
                    <td style="border: 1px solid; padding: 5px;">Keterangan Tambahan</td>
                    <td style="border: 1px solid; padding: 5px;">{{ $Vehicle->description }}</td>
                </tr>
                <tr style="height: 80px;">
                    <td colspan="3" style="border: 1px solid; padding: 5px; vertical-align: top;">Gambar Barang: <br>
                        <img src="{{ asset($Vehicle->image->image_path) }}" alt="Gambar Kondisi Aset" style="height: 150px; width:150px; margin-top: 2rem">
                    </td>
                </tr>
            @endforeach
        </table><br><br><br><br><br>
        <table style="width: 100%; font-size:11pt; border-collapse: collapse;">
            @foreach($vehicle as $Vehicle)
                <tr>
                    <td colspan="3" style="border: 1px solid; padding: 5px; vertical-align: top;">Detail Penanggung Jawab:</td>
                </tr>
                <tr>
                    <td style="width: 5%; border: 1px solid; padding: 5px;">1</td>
                    <td style="width: 40%; border: 1px solid; padding: 5px;">Nama</td>
                    <td style="width: 55%; border: 1px solid; padding: 5px;">{{ $Vehicle->assetHolder->employee_name }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid; padding: 5px;">2</td>
                    <td style="border: 1px solid; padding: 5px;">NIP</td>
                    <td style="border: 1px solid; padding: 5px;">{{ $Vehicle->assetHolder->nip }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid; padding: 5px;">3</td>
                    <td style="border: 1px solid; padding: 5px;">Instansi</td>
                    <td style="border: 1px solid; padding: 5px;">{{ $Vehicle->assetHolder->agency }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid; padding: 5px;">4</td>
                    <td style="border: 1px solid; padding: 5px;">Unit Kerja</td>
                    <td style="border: 1px solid; padding: 5px;">{{ $Vehicle->assetHolder->work_unit }}</td>
                </tr>
                <tr>
                    <td style="border: 1px solid; padding: 5px;">5</td>
                    <td style="border: 1px solid; padding: 5px;">Jabatan</td>
                    <td style="border: 1px solid; padding: 5px;">{{ $Vehicle->assetHolder->position }}</td>
                </tr>
            @endforeach
        </table><br>
        <table style="width: 100%; font-size:11pt; border-collapse: collapse;">
            @foreach($vehicle as $Vehicle)
                <tr style="height: 80px;">
                    <td colspan="3" style="border: none; padding: 5px; vertical-align: top; text-align: center;">
                        <img src="{{ asset('QR Code/aset_' . $Vehicle->id_asset . '.png') }}" alt="Gambar Kondisi Aset" style="height: 150px; width:150px; margin-top: 2rem;">
                    </td>
                </tr>
            @endforeach
        </table>        
    </div>
</body>

</html>
