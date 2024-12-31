<table id="add-row" class="display table table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Aset</th>
            <th>Sub-Kategori</th>
            <th>Nama Aset</th>
            <th>Plat Nomor</th>
            <th>Merk</th>
            <th>Model</th>
            <th>Ukuran CC</th>
            <th>No Rangka</th>
            <th>No Mesin</th>
            <th>No BPKB</th>
            <th>Warna</th>
            <th>Tahun Pembuatan</th>
            <th>Nilai Aset</th>
            <th>Keterangan</th>
            <th>Pemegang Aset</th>
            <th style="width: 10%"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($vehicle as $Vehicle)
            <tr onclick="window.location.href='/aset/{{ $Vehicle->id_asset }}/view';" style="cursor: pointer;">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $Vehicle->id_asset }}</td>
                <td>{{ $Vehicle->jenisAset->sub_category ?? 'N/A' }}</td>
                <td>{{ $Vehicle->asset_name }}</td>
                <td>{{ $Vehicle->number_plate }}</td>
                <td>{{ $Vehicle->brand }}</td>
                <td>{{ $Vehicle->type }}</td>
                <td>{{ $Vehicle->cc_size }}</td>
                <td>{{ $Vehicle->frame_number }}</td>
                <td>{{ $Vehicle->machine_number }}</td>
                <td>{{ $Vehicle->bpkb_number }}</td>
                <td>{{ $Vehicle->color }}</td>
                <td>{{ $Vehicle->production_year }}</td>
                <td>{{ $Vehicle->price }}</td>
                <td>{{ $Vehicle->description }}</td>
                <td>{{ $Vehicle->assetHolder->employee_name ?? 'N/A' }}</td>
                <td>
                    <div class="form-button-action">
                        <a href="/kendaraan/{{ $Vehicle->id_asset }}/edit" class="btn btn-primary my-1 mx-1"><i class="bi bi-pencil-square"></i></a>
                        <form action="/kendaraan/{{ $Vehicle->id_asset }}/destroy" method="POST">
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