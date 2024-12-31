<table id="add-row" class="display table table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Aset</th>
            <th>Nama Aset</th>
            <th>Kategori</th>
            <th>Sub-Kategori</th>
            <th>Keterangan</th>
            <th>User Entry</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($asset as $Asset)
        <tr onclick="window.location.href='/{{ $Asset->asset_category }}/{{ $Asset->id_asset }}/view';" style="cursor: pointer;">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $Asset->id_asset }}</td>
            <td>{{ $Asset->asset_name }}</td>
            <td>{{ ucwords($Asset->asset_category) }}</td>
            <td>{{ $Asset->jenisAset->sub_category }}</td>
            <td>{{ $Asset->description }}</td>
            <td>{{ $Asset->userEntry->employee_name ?? '' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>