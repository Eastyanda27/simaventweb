<table id="add-row" class="display table table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode-Nama Aset</th>
            <th>Metode Penyusutan</th>
            <th>Nilai Beli</th>
            <th>Nilai Sisa</th>
            <th>Umur Ekonomis</th>
            <th>Depresiasi Tahunan</th>
            <th>Depresiasi Bulanan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($depreciation as $Depreciation)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $Depreciation->dataAset->id_asset }} - {{ $Depreciation->dataAset->asset_name }}</td>
            <td>{{ $Depreciation->method }}</td>
            <td>{{ $Depreciation->price }}</td>
            <td>{{ $Depreciation->residual_price }}</td>
            <td>{{ $Depreciation->economic_life }}</td>
            <td>{{ $Depreciation->depreciation_yearly }}</td>
            <td>{{ $Depreciation->depreciation_monthly }}</td>
        </tr>
        @endforeach
    </tbody>
</table>