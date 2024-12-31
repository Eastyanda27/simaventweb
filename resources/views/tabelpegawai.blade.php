<table id="add-row" class="display table table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Email</th>
            <th>NIP</th>
            <th>Nama Pegawai</th>
            <th>Hak Akses</th>
            <th>TTL</th>
            <th>Golongan/Pangkat</th>
            <th>Jenis Kelamin</th>
            <th>Pendidikan Terakhir</th>
            <th>Instansi</th>
            <th>Unit Kerja</th>
            <th>Jabatan</th>
            <th style="width: 10%"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employee as $Employee)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $Employee->email }}</td>
            <td>{{ $Employee->nip }}</td>
            <td>{{ $Employee->employee_name }}</td>
            <td>{{ $Employee->access }}</td>
            <td>{{ $Employee->tempat_lahir }}, {{ \Carbon\Carbon::parse($Employee->tanggal_lahir)->format('d M Y') }}</td>
            <td>{{ $Employee->pangkat }}</td>
            <td>{{ $Employee->jenis_kelamin }}</td>
            <td>{{ $Employee->pendidikan_terakhir }}</td>
            <td>{{ $Employee->instansi }}</td>
            <td>{{ $Employee->unit_kerja }}</td>
            <td>{{ $Employee->jabatan }}</td>
            <td>
                <div class="form-button-action">
                    <a href="/pegawai/{{ $Employee->id_user }}/edit" class="btn btn-primary my-1 mr-1"><i class="bi bi-pencil-square"></i></a>
                    <form action="/pegawai/{{ $Employee->id_user }}/reset" method="POST">
                        @csrf
                        <button type="submit" data-toggle="tooltip" class="btn btn-warning my-1 mx-1" data-original-title="Reset Akun" onclick="return confirm('Yakin mau mereset Akun?')">
                            <i class="bi bi-x-circle-fill"></i>
                        </button>
                    </form>
                    <form action="/pegawai/{{ $Employee->id_user }}/destroy" method="POST">
                        @csrf
                        <button type="submit" data-toggle="tooltip" class="btn btn-danger my-1 ml-1" data-original-title="Hapus" onclick="return confirm('Yakin mau hapus Akun?')">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>