@extends('/main')

@section("container")
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Edit Akun {{ $employee->employee_name }}</h4>
        </div>
        <div class="card">
            <div class="col-12 mt-4">  
                <form action="/pegawai/{{ $employee->id_user }}/update" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Email</label>
                                <input name="email" id="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Isi Email" value="{{ $employee->email }}" required>
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Nama Pegawai</label>
                                <input name="employee_name" id="employee_name" type="text" class="form-control @error('employee_name') is-invalid @enderror" placeholder="Isi Nama Lengkap Pegawai" value="{{ $employee->employee_name }}" required>
                                @error('employee_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>NIP</label>
                                <input name="nip" id="nip" type="text" class="form-control @error('nip') is-invalid @enderror" placeholder="Isi NIP" value="{{ $employee->nip }}">
                                @error('nip')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Hak Akses</label>
                                <select name="access" id="access" class="form-control @error('access') @enderror" required>
                                    @foreach ($access as $Access)
                                        <option value="{{ $Access->access }}" selected>{{ $Access->access }}</option>
                                    @endforeach
                                    <option value="Kepala Dinas">Kepala Dinas</option>
                                    <option value="Kepala Bidang">Kepala Bidang</option>
                                    <option value="Staf Pegawai">Staf Pegawai</option>
                                    <option value="Admin">Admin</option>
                                </select>
                                @error('access')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer no-bd">
                        <a href="/kendaraan" class="btn btn-danger">Tutup</a>
                        <button type="submit" id="addRowButton" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection