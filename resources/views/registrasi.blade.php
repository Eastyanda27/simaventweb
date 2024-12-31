<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Simavent</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<meta name="csrf-token" content="{{ csrf_token() }}"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

	<!-- CSS Files -->
	<link href="{{asset('assets/css/bootstrap1.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/css/style.min.css')}}" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
		<div class="main-header">
			@include('/navbar')
		</div>

		<div class="main-panel" style="width: 100%">
			<div class="content">
				<div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Perbarui Data Diri</h4>
                    </div>
                    <div class="card">
                        <div class="col-12 mt-4">  
                            <form action="/registrasi-update" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>Nama Pegawai *</label>
                                            <input name="employee_name" id="employee_name" type="text" class="form-control @error('employee_name') is-invalid @enderror" placeholder="Isi Nama Pegawai" value="{{ $user->employee_name }}" required>
                                            @error('employee_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>NIP *</label>
                                            <input name="nip" id="nip" type="text" class="form-control @error('nip') is-invalid @enderror" placeholder="Isi NIP" value="{{ $user->nip }}" required>
                                            @error('nip')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>Tempat Lahir *</label>
                                            <input name="place_birth" id="place_birth" type="text" class="form-control @error('place_birth') is-invalid @enderror" placeholder="Isi Tempat Lahir" value="" required>
                                            @error('place_birth')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>Tanggal Lahir *</label>
                                            <input name="date_birth" id="date_birth" type="date" class="form-control @error('date_birth') is-invalid @enderror" placeholder="Isi Tanggal Lahir" value="" required>
                                            @error('date_birth')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label for="group">Golongan (jika PNS)</label>
                                            <select name="group" id="group" class="form-control @error('group') @enderror">
                                                <option value="">-- Pilih --</option>
                                                <option value="Golongan I (Juru)">Golongan I (Juru)</option>
                                                <option value="Golongan II (Pengatur)">Golongan II (Pengatur)</option>
                                                <option value="Golongan III (Penata)">Golongan III (Penata)</option>
                                                <option value="Golongan IV (Pembina)">Golongan IV (Pembina)</option>
                                            </select>
                                            @error('group')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label for="rank">Pangkat (jika PNS)</label>
                                            <select name="rank" id="rank" class="form-control @error('rank') @enderror">
                                                <option value="">-- Pilih --</option>
                                            </select>
                                            @error('rank')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label for="gender">Jenis Kelamin *</label>
                                            <select name="gender" id="gender" class="form-control @error('gender') @enderror" required>
                                                <option value="">-- Pilih --</option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            @error('gender')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label for="last_education">Pendidikan Terakhir (optional)</label>
                                            <select name="last_education" id="last_education" class="form-control @error('last_education') @enderror">
                                                <option value="">-- Pilih --</option>
                                                <option value="SMA">Sekolah Menengah Atas (SMA)</option>
                                                <option value="Diploma (D3/D4)">Diploma (D3/D4)</option>
                                                <option value="Sarjana (S1)">Sarjana (S1)</option>
                                                <option value="Magister (S2)">Magister (S2)</option>
                                            </select>
                                            @error('last_education')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>Instansi *</label>
                                            <input name="agency" id="agency" type="text" class="form-control @error('agency') is-invalid @enderror" placeholder="(contoh: Dinas Komunikasi dan Informatika)" value="">
                                            @error('agency')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>Unit Kerja *</label>
                                            <input name="work_unit" id="work_unit" type="text" class="form-control @error('work_unit') is-invalid @enderror" placeholder="(contoh: Bidang Layanan E-Government)" value="">
                                            @error('work_unit')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>Jabatan *</label>
                                            <input name="position" id="position" type="text" class="form-control @error('position') is-invalid @enderror" placeholder="(contoh: Kepala Bidang)" value="">
                                            @error('position')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>Foto Profil</label>
                                            <input name="image" id="image" type="file" class="form-control @error('image') is-invalid @enderror" value="">
                                            @error('image')
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
			</div>
		</div>
	</div>
</body>

<!--   Core JS Files   -->
<script src="{{ asset('assets/js/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('assets/js/jquery.scrollbar.min.js') }}"></script>

<!-- jQuery UI -->
<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.ui.touch-punch.min.js') }}"></script>

<!-- Datatables -->
<script src="{{ asset('assets/js/datatables.min.js') }}"></script>

<!-- Chart JS -->
<script src="{{ asset('assets/js/chart.min.js') }}"></script>

<!-- jQuery Sparkline -->
<script src="{{ asset('assets/js/jquery.sparkline.min.js') }}"></script>

<!-- Chart Circle -->
<script src="{{ asset('assets/js/circles.min.js') }}"></script>

<!-- Atlantis JS -->
<script src="{{ asset('assets/js/atlantis.min.js') }}"></script>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $('#group').change(function() {
        var group = $(this).val();
        var rank = $('#rank');

        rank.html('<option value="">-- Pilih --</option>');

        if (group === 'Golongan I (Juru)') {
            rank.append('<option value="Golongan Ia (Juru Muda)">Golongan Ia (Juru Muda)</option>');
            rank.append('<option value="Golongan Ib (Juru Muda Tingkat I)">Golongan Ia (Juru Muda Tingkat I)</option>');
            rank.append('<option value="Golongan Ic (Juru)">Golongan Ic (Juru)</option>');
            rank.append('<option value="Golongan Id (Juru Tingkat I)">Golongan Id (Juru Tingkat I)</option>');
        }
        else if (group === 'Golongan II (Pengatur)') {
            rank.append('<option value="Golongan IIa (Pengatur Muda)">Golongan IIa (Pengatur Muda)</option>');
            rank.append('<option value="Golongan IIb (Pengatur Muda Tingkat I)">Golongan IIb (Pengatur Muda Tingkat I)</option>');
            rank.append('<option value="Golongan IIc (Pengatur)">Golongan IIc (Pengatur)</option>');
            rank.append('<option value="Golongan IId (Pengatur Tingkat I)">Golongan IId (Pengatur Tingkat I)</option>');
        }
        else if (group === 'Golongan III (Penata)') {
            rank.append('<option value="Golongan IIIa (Penata Muda)">Golongan IIIa (Penata Muda)</option>');
            rank.append('<option value="Golongan IIIb (Penata Muda Tingkat I)">Golongan IIIb (Penata Muda Tingkat I)</option>');
            rank.append('<option value="Golongan IIIc (Penata)">Golongan III (Penata)</option>');
            rank.append('<option value="Golongan IIId (Penata Tingkat I)">Golongan IIId (Penata Tingkat I)</option>');
        }
        else if (group === 'Golongan IV (Pembina)') {
            rank.append('<option value="Golongan IVa (Pembina)">Golongan IVa (Pembina)</option>');
            rank.append('<option value="Golongan IVb (Pembina Tingkat I)">Golongan IVb (Pembina Tingkat I)</option>');
            rank.append('<option value="Golongan IVc (Pembina Muda)">Golongan IVc (Pembina Muda)</option>');
            rank.append('<option value="Golongan IVd (Pembina Madya)">Golongan IVd (Pembina Madya)</option>');
            rank.append('<option value="Golongan IVe (Pembina Utama)">Golongan IVe (Pembina Utama)</option>');
        }
    });
</script>

</html>