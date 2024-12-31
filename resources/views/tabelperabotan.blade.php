<table id="add-row" class="display table table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Aset</th>
            <th>Kategori</th>
            <th>Sub-Kategori</th>
            <th>Nama Aset</th>
            <th>Merk</th>
            <th>Model</th>
            <th>Spesifikasi</th>
            <th>Masa Garansi</th>
            <th>Harga</th>
            <th>Kuantitas</th>
            <th>Kondisi</th>
            <th>Keterangan</th>
            <th>Pemegang Aset</th>
            <th style="width: 10%"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($furniture as $Furniture)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $Furniture->id_asset }}</td>
            <td>{{ $Furniture->asset_category }}</td>
            <td>{{ $Furniture->sub_category }}</td>
            <td>{{ $Furniture->asset_name }}</td>
            <td>{{ $Furniture->brand }}</td>
            <td>{{ $Furniture->type }}</td>
            <td>{{ $Furniture->specification }}</td>
            <td>{{ $Furniture->warranty_period }}</td>
            <td>{{ $Furniture->price }}</td>
            <td>{{ $Furniture->quantity }}</td>
            <td>{{ $Furniture->condition }}</td>
            <td>{{ $Furniture->description }}</td>
            <td>{{ $Furniture->employee_name }}</td>
            <td>
                <div class="form-button-action">
                    <a href="/perabotan/{{ $Furniture->id_asset }}/edit" class="btn btn-primary my-1 mr-1"><i class="bi bi-pencil-square"></i></a>
                    <form action="/perabotan/{{ $Furniture->id_asset }}/destroy" method="POST">
                        @csrf
                        <button type="submit" data-toggle="tooltip" class="btn btn-danger my-1 ml-1" data-original-title="Hapus" onclick="return confirm('Yakin mau hapus data?')">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>