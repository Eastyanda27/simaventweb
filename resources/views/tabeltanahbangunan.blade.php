<table id="add-row" class="display table table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Aset</th>
            <th>Sub-Kategori</th>
            <th>Nama Aset</th>
            <th>Luas</th>
            <th>Status Hak</th>
            <th>Alamat</th>
            <th>Kecamatan</th>
            <th>Kelurahan/Desa</th>
            <th>Kondisi</th>
            <th>Tanggal Sertifikat</th>
            <th>No Sertifikat</th>
            <th>Asal Usul</th>
            <th>Harga</th>
            <th>Masa Manfaat</th>
            <th>Penggunaan</th>
            <th>Keterangan</th>
            <th style="width: 10%"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($building as $Building)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $Building->id_asset }}</td>
            <td>{{ $Building->sub_category }}</td>
            <td>{{ $Building->asset_name }}</td>
            <td>{{ $Building->size }}</td>
            <td>{{ $Building->rights_status }}</td>
            <td>{{ $Building->address }}</td>
            <td>{{ $Building->subdistrict }}</td>
            <td>{{ $Building->village }}</td>
            <td>{{ $Building->condition }}</td>
            <td>{{ $Building->certificate_date }}</td>
            <td>{{ $Building->certificate_number }}</td>
            <td>{{ $Building->origin }}</td>
            <td>{{ $Building->price }}</td>
            <td>{{ $Building->useful_life }}</td>
            <td>{{ $Building->use_for }}</td>
            <td>{{ $Building->description }}</td>
            <td>
                <div class="form-button-action">
                    <a href="/tanahbangunan/{{ $Building->id_asset }}/edit" class="btn btn-primary my-1 mr-1"><i class="bi bi-pencil-square"></i></a>
                    <form action="/tanahbangunan/{{ $Building->id_asset }}/destroy" method="POST">
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