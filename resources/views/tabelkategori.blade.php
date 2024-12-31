<table id="add-row" class="display table table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Kategori</th>
            <th>Sub-Kategori</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($category as $Category)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $Category->id_category }}</td>
            <td>{{ ucwords($Category->asset_category) }}</td>
            <td>{{ $Category->sub_category }}</td>
            <td>{{ $Category->description }}</td>
            <td>
                <div class="form-button-action">
                    <a href="/kendaraan/{{ $Category->id_category }}/edit" class="btn btn-primary my-1 mx-1"><i class="bi bi-pencil-square"></i></a>
                    <form action="/kategori/{{ $Category->id_category }}/destroy" method="POST">
                        @csrf
                        <button type="submit" data-toggle="tooltip" class="btn btn-danger my-1 ml-1" data-original-title="Hapus" onclick="return confirm('YAKIN MAU HAPUS DATA KATEGORI? JIKA OKE, SETELAH DIHAPUS, DATA ASET YANG MEMILIKI KATEGORI INI JUGA AKAN DIHAPUS')">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>