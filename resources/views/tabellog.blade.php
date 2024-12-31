<table id="add-row" class="display table table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Deskripsi</th>
            <th>Kode Aset</th>
            <th>Nama Aset</th>
            <th>Aktor</th>
            <th>Waktu</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($activities as $Activities)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $Activities->description }}</td>
            <td>{{ $Activities->properties['id_asset'] }}</td>
            <td>{{ $Activities->properties['asset_name'] }}</td>
            <td>{{ $Activities->employee_name }}</td>
            <td>{{ $Activities->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>