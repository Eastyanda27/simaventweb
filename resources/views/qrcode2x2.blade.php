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
            size: 8cm 8cm;
        }

        body {
            width: 100%;
            height: auto;
            font-family: Arial, sans-serif;
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
    <table style="width: 100%; font-size:8pt; border-collapse: collapse;">
        @foreach($vehicle as $Vehicle)
            <tr style="height: 80px;">
                <td style="border: none; padding: 5px; vertical-align: top; text-align: center;">
                    <img src="{{ asset('QR Code/aset_' . $Vehicle->id_asset . '.png') }}" alt="Gambar Kondisi Aset" style="height: 4cm; width: 4cm;">
                </td>
            </tr>
            <tr>
                <td style="border: none; padding: 5px; vertical-align: top; text-align: center;">{{ $Vehicle->asset_name }}</td>
            </tr>
            <tr>
                <td style="border: none; padding: 5px; vertical-align: top; text-align: center;">{{ $Vehicle->id_asset }}</td>
            </tr>
        @endforeach
    </table>    
</body>

</html>
