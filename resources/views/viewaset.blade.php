<?php
    $n=16;
	if (!function_exists('getAsset'))
	{
		function getAsset($n) {
			$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$randomString = '';
	
			for ($i = 0; $i < $n; $i++) {
				$index = rand(0, strlen($characters) - 1);
				$randomString .= $characters[$index];
			}
	
			return $randomString;
		}
	}
?>

@extends('/main')

@section("container")
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Detail Aset</h4>
        <div class="ml-auto">
            @foreach($vehicle as $Vehicle)
                <a href="/aset/{{ $Vehicle->id_asset }}/print" class="btn btn-primary my-1 mr-1"><i class="bi bi-printer-fill"></i> Print</a>
            @endforeach
        </div>
    </div>
    @if(session()->has('success'))
		<div class="alert alert-success col-lg-12" role="alert">
			{{ session('success') }}
		</div>
	@endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <!-- Main Content -->
                <div class="container mt-3">
                    <div class="row">
                        <!-- Title Section -->
                        <div class="col-12 mb-3">
                            @foreach ($vehicle as $Vehicle)
                                <h2>{{ $Vehicle->asset_name }}</h2>
                            @endforeach
                        </div>

                        <!-- Data Aset -->
                        <div class="col-lg-6 col-md-12 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    Data Aset
                                </div>
                                <div class="row ml-2 mt-3">
                                    <div class="ml-3" style="width: 38%">
                                        <p style="height: 20px"><strong>Nama Aset</strong></p>
                                        <p style="height: 20px"><strong>Kode Aset</strong></p>
                                        <p style="height: 20px"><strong>Kategori</strong></p>
                                        <p style="height: 20px"><strong>Sub-Kategori</strong></p>
                                        <p style="height: 20px"><strong>Nomor Plat</strong></p>
                                        <p style="height: 20px"><strong>Merk Kendaraan</strong></p>
                                        <p style="height: 20px"><strong>Tipe Kendaraan</strong></p>
                                        <p style="height: 20px"><strong>Ukuran CC</strong></p>
                                        <p style="height: 20px"><strong>Nomor Rangka</strong></p>
                                        <p style="height: 20px"><strong>Nomor Mesin</strong></p>
                                        <p style="height: 20px"><strong>Nomor BPKB</strong></p>
                                        <p style="height: 20px"><strong>Warna</strong></p>
                                        <p style="height: 20px"><strong>Tahun Produksi</strong></p>
                                        <p style="height: 20px"><strong>Keterangan Tambahan</strong></p>
                                    </div>
                                    <div class="">
                                        @foreach ($vehicle as $Vehicle)
                                            <p style="height: 20px"><strong> :</strong> {{ $Vehicle->asset_name }}</p>
                                            <p style="height: 20px"><strong> :</strong> {{ $Vehicle->id_asset }}</p>
                                            <p style="height: 20px"><strong> :</strong> {{ ucwords($Vehicle->jenisAset->asset_category) }}</p>
                                            <p style="height: 20px"><strong> :</strong> {{ $Vehicle->jenisAset->sub_category }}</p>
                                            <p style="height: 20px"><strong> :</strong> {{ $Vehicle->number_plate }}</p>
                                            <p style="height: 20px"><strong> :</strong> {{ $Vehicle->brand }}</p>
                                            <p style="height: 20px"><strong> :</strong> {{ $Vehicle->type }}</p>
                                            <p style="height: 20px"><strong> :</strong> {{ $Vehicle->cc_size }}</p>
                                            <p style="height: 20px"><strong> :</strong> {{ $Vehicle->frame_number }}</p>
                                            <p style="height: 20px"><strong> :</strong> {{ $Vehicle->machine_number }}</p>
                                            <p style="height: 20px"><strong> :</strong> {{ $Vehicle->bpkb_number }}</p>
                                            <p style="height: 20px"><strong> :</strong> {{ $Vehicle->color }}</p>
                                            <p style="height: 20px"><strong> :</strong> {{ $Vehicle->production_year }}</p>
                                            <p style="height: 20px"><strong> :</strong> {{ $Vehicle->description }}</p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    Data Pemegang Aset
                                </div>
                                <div class="row ml-2 mt-3">
                                    <div class="ml-3" style="width: 38%">
                                        <p style="height: 20px"><strong>Nama</strong></p>
                                        <p style="height: 20px"><strong>NIP</strong></p>
                                        <p style="height: 20px"><strong>Instansi</strong></p>
                                        <p style="height: 20px"><strong>Unit Kerja</strong></p>
                                        <p style="height: 20px"><strong>Jabatan</strong></p>
                                    </div>
                                    <div class="">
                                        @foreach ($vehicle as $Vehicle)
                                            <p style="height: 20px"><strong> :</strong> {{ $Vehicle->assetHolder->employee_name }}</p>
                                            <p style="height: 20px"><strong> :</strong> {{ $Vehicle->assetHolder->nip }}</p>
                                            <p style="height: 20px"><strong> :</strong> {{ $Vehicle->assetHolder->agency }}</p>
                                            <p style="height: 20px"><strong> :</strong> {{ $Vehicle->assetHolder->work_unit }}</p>
                                            <p style="height: 20px"><strong> :</strong> {{ $Vehicle->assetHolder->position }}</p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Foto & QR Code -->
                        <div class="col-lg-6 col-md-12 mb-3">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <div>Foto & Qr-Code</div>
                                    <div class="ml-auto">
                                        <div class="btn-group">
                                            <button class="btn btn-primary btn-round dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-download"></i> QR-Code
                                            </button>
                                            <ul class="dropdown-menu">
                                                @foreach ($vehicle as $Vehicle)
                                                    <li><a class="dropdown-item" href="/qrcode/{{ $Vehicle->id_asset }}/print/2x2" data-size="2x2">4 x 4 cm</a></li>
                                                    <li><a class="dropdown-item" href="/qrcode/{{ $Vehicle->id_asset }}/print/4x4" data-size="4x4">7 x 7 cm</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body text-center">
                                    <div class="row qr-section">
                                        <div class="col-6">
                                            @foreach ($vehicle as $Vehicle)
                                                <img src="{{ asset($Vehicle->image->image_path) }}" alt="Foto Aset">
                                            @endforeach
                                        </div>
                                        <div class="col-6">
                                            @foreach ($vehicle as $Vehicle)
                                                <img src="{{ asset('QR Code/aset_' . $Vehicle->id_asset . '.png') }}" alt="QR Code">
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    Navigasi
                                </div>
                                <div class="card-body">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="history-tab" data-bs-toggle="tab" data-bs-target="#history" type="button" role="tab" aria-controls="history" aria-selected="true">Riwayat</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="agenda-tab" data-bs-toggle="tab" data-bs-target="#agenda" type="button" role="tab" aria-controls="agenda" aria-selected="false">Agenda</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="finance-tab" data-bs-toggle="tab" data-bs-target="#finance" type="button" role="tab" aria-controls="finance" aria-selected="false">Keuangan</button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="journal-tab" data-bs-toggle="tab" data-bs-target="#journal" type="button" role="tab" aria-controls="journal" aria-selected="false">Jurnal</button>
                                        </li>
                                    </ul>

                                    <div class="tab-content mt-3" id="myTabContent">
                                        <!-- History Tab Content -->
                                        <div class="tab-pane fade show active" id="history" role="tabpanel" aria-labelledby="history-tab">
                                            <p>Fitur ini berfungsi untuk mencatat perjalanan riwayat (history) perjalanan dinas yang berkaitan dengan aset</p>
                                            <p><strong>GOAL:</strong> Melacak riwayat perjalanan dinas dan siapa yang bertanggung jawab dalam perjalanan dinas itu.</p>
                                            <button class="btn btn-primary btn-round mt-3" data-toggle="modal" data-target="#addRowLocation">
											    <i class="bi bi-plus-lg"></i> Riwayat
										    </button>
                                        </div>

                                        <!-- Agenda Tab Content -->
                                        <div class="tab-pane fade" id="agenda" role="tabpanel" aria-labelledby="agenda-tab">
                                            <p>Fitur ini berfungsi untuk mencatat agenda atau kalender aset, misalnya jadwal servis atau perawatan, tanggal saat sparepart harus diganti, jadwal pajak, dan sebagainya.</p>
                                            <p><strong>GOAL:</strong> Sebagai pengingat kapan aset harus dirawat dan harus diambil tindakan.</p>
                                            <div class="table-responsive">
                                                <table id="add-row" class="display table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Kode Agenda</th>
                                                            <th>Nama Aset</th>
                                                            <th>Kategori Agenda</th>
                                                            <th>Setiap Hari</th>
                                                            <th>Setiap Tanggal</th>
                                                            <th>Kustom Tanggal</th>
                                                            <th>Aktivitas</th>
                                                            <th>Keterangan</th>
                                                            <th style="width: 10%"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($agenda as $Agenda)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $Agenda->id_agenda }}</td>
                                                            <td>{{ $Agenda->assetData->asset_name }}</td>
                                                            <td>{{ $Agenda->type }}</td>
                                                            <td>{{ $Agenda->day ? \Carbon\Carbon::parse($Agenda->day)->translatedFormat('l') : '' }}</td>
                                                            <td>{{ $Agenda->date }}</td>
                                                            <td>{{ $Agenda->custom_date ? \Carbon\Carbon::parse($Agenda->custom_date)->translatedFormat('d M Y') : '' }}</td>
                                                            <td>{{ $Agenda->activity }}</td>
                                                            <td>{{ $Agenda->description }}</td>
                                                            <td>
                                                                <div class="form-button-action">
                                                                    <a href="/agenda/{{ $Agenda->id_agenda }}/edit" class="btn btn-primary my-1 mx-1"><i class="bi bi-pencil-square"></i></a>
                                                                    <form action="/agenda/{{ $Agenda->id_agenda }}/destroy" method="POST">
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
                                            </div>
                                            <button class="btn btn-primary btn-round mt-3" data-toggle="modal" data-target="#addRowAgenda">
											    <i class="bi bi-plus-lg"></i> Agenda
										    </button>
                                        </div>

                                        <!-- Financial Tab Content -->
                                        <div class="tab-pane fade" id="finance" role="tabpanel" aria-labelledby="finance-tab">
                                            <p>Fitur ini berfungsi untuk mencatat transaksi pengeluaran dan pemasukan yang berhubungan dengan aset ini, misalnya biaya servis, pajak, penggantian spare-part, biaya perawatan, dan sebagainya.</p>
                                            <p><strong>GOAL:</strong> Anda jadi tahu berapa total biaya yang sudah Anda keluarkan atau dapatkan sebagai dampak kepemilikan aset ini.</p>
                                            <button class="btn btn-primary btn-round mt-3" data-toggle="modal" data-target="#addRowFinance">
											    <i class="bi bi-plus-lg"></i> Keuangan
										    </button>
                                        </div>

                                        <!-- Journal Tab Content -->
                                        <div class="tab-pane fade" id="journal" role="tabpanel" aria-labelledby="journal-tab">
                                            <p>Fitur ini berfungsi sebagai semacam buku harian untuk mencatat berbagai kejadian yang menyertai aset, misalnya saat ada perbaikan, kecelakaan, atau hal-hal lain yang sekiranya perlu direkam.</p>
                                            <p><strong>GOAL:</strong>  Anda memiliki catatan kapan dan apa saja kejadian yang sudah dialami aset ini.</p>
                                            <button class="btn btn-primary btn-round mt-3" data-toggle="modal" data-target="#addRowJournal">
											    <i class="bi bi-plus-lg"></i> Jurnal
										    </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="addRowLocation" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header no-bd">
									<h3 class="modal-title">
										<span class="fw-mediumbold">
										    Tambah</span>
										<span class="fw-light">
											Riwayat Perjalanan Dinas</span>
									</h3>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
                                <div class="container">
                                    <div id="map" style="height: 400px; width: 100%;"></div>
                                    <button onclick="getLocation()">Update Lokasi Saya</button>
                                </div>
								<div class="modal-body">
									<form id="location-form" method="POST" action="/update-location" style="display: none;">
                                        @csrf
                                        <input type="hidden" id="latitude" name="latitude">
                                        <input type="hidden" id="longitude" name="longitude">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input name="user_entry" id="user_entry" type="text" class="form-control @error('user_entry') is-invalid @enderror" placeholder="" value="{{ $user_entry }}" readonly hidden>
                                                @error('user_entry')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                @foreach ($vehicle as $Vehicle)
                                                    <input name="id_asset" id="id_asset" type="text" class="form-control @error('id_asset') is-invalid @enderror" placeholder="" value="{{ $Vehicle->id }}" readonly hidden>
                                                @endforeach
                                                @error('id_asset')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input name="id_history" id="id_history" type="text" class="form-control @error('id_history') is-invalid @enderror" placeholder="" value="<?php echo getAsset($n) ?>" readonly hidden>
                                                @error('id_history')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </form>
								</div>
							</div>
						</div>
					</div>
                    <div class="modal fade" id="addRowAgenda" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header no-bd">
									<h3 class="modal-title">
										<span class="fw-mediumbold">
										    Tambah</span>
										<span class="fw-light">
											Riwayat Agenda</span>
									</h3>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="/agenda" method="POST">
										@csrf
										<div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
													<label>Tipe *</label>
                                                    <select name="type" id="type" class="form-control @error('type') @enderror" onchange="showInputFields()" required>
                                                        <option value="">--Pilih Tipe--</option>
                                                        <option value="Mingguan">Berkala: Mingguan</option>
                                                        <option value="Bulanan">Berkala: Bulanan</option>
                                                        <option value="Kustom">Kustom: Tanggal Spesifik</option>
                                                    </select>
												    @error('type')
													<div class="invalid-feedback">
														{{ $message }}
													</div>
													@enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12" id="weeklyinput" style="display: none;">
                                                <div class="form-group form-group-default">
													<label>Setiap Hari *</label>
                                                    <select name="day" id="day" class="form-control @error('day') @enderror">
                                                        <option value="">--Pilih Hari--</option>
                                                        <option value="Monday">Senin</option>
                                                        <option value="Tuesday">Selasa</option>
                                                        <option value="Wednesday">Rabu</option>
                                                        <option value="Thursday">Kamis</option>
                                                        <option value="Friday">Jumat</option>
                                                        <option value="Saturday">Sabtu</option>
                                                        <option value="Monday">Minggu</option>
                                                    </select>
												    @error('day')
													<div class="invalid-feedback">
														{{ $message }}
													</div>
													@enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12" id="monthlyinput" style="display: none">
                                                <div class="form-group form-group-default">
													<label>Setiap Hari *</label>
                                                    <select name="date" id="date" class="form-control @error('date') @enderror">
                                                        <option value="">--Pilih Setiap Tanggal--</option>
                                                        @for ($i = 1; $i <= 31; $i++)
                                                            <option value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
												    @error('date')
													<div class="invalid-feedback">
														{{ $message }}
													</div>
													@enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12" id="custominput" style="display: none">
                                                <div class="form-group form-group-default">
                                                    <label>Tanggal *</label>
                                                    <input name="custom_date" id="custom_date" type="date" class="form-control @error('custom_date') is-invalid @enderror" placeholder="Isi Tanggal Transaksi" value="{{ old('custom_date') }}">
                                                    @error('custom_date')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Agenda/Aktivitas *</label>
                                                    <input name="activity" id="activity" type="text" class="form-control @error('activity') is-invalid @enderror" placeholder="Isi Aktivitas yang berkaitan dengan aset" value="{{ old('activity') }}" required>
                                                    @error('activity')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Keterangan</label>
                                                    <input name="description" id="description" type="text" class="form-control @error('description') is-invalid @enderror" placeholder="Isi Keterangan tambahan (jika ada)" value="{{ old('description') }}">
                                                    @error('description')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input name="user_entry" id="user_entry" type="text" class="form-control @error('user_entry') is-invalid @enderror" placeholder="" value="{{ $user_entry }}" readonly hidden>
                                                    @error('user_entry')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    @foreach ($vehicle as $Vehicle)
                                                        <input name="id_asset" id="id_asset" type="text" class="form-control @error('id_asset') is-invalid @enderror" placeholder="" value="{{ $Vehicle->id }}" readonly hidden>
                                                    @endforeach
                                                    @error('id_asset')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input name="id_agenda" id="id_agenda" type="text" class="form-control @error('id_agenda') is-invalid @enderror" placeholder="" value="<?php echo getAsset($n) ?>" readonly hidden>
                                                    @error('id_agenda')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
										</div>
										<div class="modal-footer no-bd">
											<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
											<button type="submit" id="addRowButton" class="btn btn-primary">Tambah</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
                    <div class="modal fade" id="addRowFinance" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header no-bd">
									<h3 class="modal-title">
										<span class="fw-mediumbold">
										    Tambah</span>
										<span class="fw-light">
											Riwayat Keuangan</span>
									</h3>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="/keuangan" method="POST">
										@csrf
										<div class="row">
											<div class="col-sm-12">
                                                <div class="form-group form-group-default">
													<label>Kategori Transaksi *</label>
                                                    <select name="category" id="category" class="form-control @error('category') @enderror">
                                                        <option value="">--Pilih Kategori--</option>
                                                        <option value="Pemasukan">Pemasukan</option>
                                                        <option value="Pengeluaran">Pengeluaran</option>
                                                    </select>
												    @error('category')
													<div class="invalid-feedback">
														{{ $message }}
													</div>
													@enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Tanggal *</label>
                                                    <input name="date" id="date" type="date" class="form-control @error('date') is-invalid @enderror" placeholder="Isi Tanggal Transaksi" value="{{ old('date') }}" required>
                                                    @error('date')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Nominal *</label>
                                                    <input name="nominal" id="nominal" type="text" class="form-control @error('nominal') is-invalid @enderror" placeholder="Isi Nominal" value="{{ old('nominal') }}" required>
                                                    @error('nominal')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Keterangan</label>
                                                    <input name="description" id="description" type="text" class="form-control @error('description') is-invalid @enderror" placeholder="Isi Keterangan mengenai Transaksi" value="{{ old('description') }}" required>
                                                    @error('description')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input name="user_entry" id="user_entry" type="text" class="form-control @error('user_entry') is-invalid @enderror" placeholder="" value="{{ $user_entry }}" readonly hidden>
                                                    @error('user_entry')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    @foreach ($vehicle as $Vehicle)
                                                        <input name="id_asset" id="id_asset" type="text" class="form-control @error('id_asset') is-invalid @enderror" placeholder="" value="{{ $Vehicle->id }}" readonly hidden>
                                                    @endforeach
                                                    @error('id_asset')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input name="id_finance" id="id_finance" type="text" class="form-control @error('id_finance') is-invalid @enderror" placeholder="" value="<?php echo getAsset($n) ?>" readonly hidden>
                                                    @error('id_finance')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
										</div>
										<div class="modal-footer no-bd">
											<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
											<button type="submit" id="addRowButton" class="btn btn-primary">Tambah</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
                    <div class="modal fade" id="addRowJournal" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header no-bd">
									<h3 class="modal-title">
										<span class="fw-mediumbold">
										    Tambah</span>
										<span class="fw-light">
											Riwayat Jurnal</span>
									</h3>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="/jurnal" method="POST">
										@csrf
										<div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Tanggal *</label>
                                                    <input name="date" id="date" type="date" class="form-control @error('date') is-invalid @enderror" placeholder="Isi Tanggal Transaksi" value="{{ old('date') }}" required>
                                                    @error('date')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Kejadian *</label>
                                                    <input name="incident" id="incident" type="text" class="form-control @error('incident') is-invalid @enderror" placeholder="Isi Kejadian yang berkaitan dengan asset" value="{{ old('incident') }}" required>
                                                    @error('incident')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Keterangan</label>
                                                    <input name="description" id="description" type="text" class="form-control @error('description') is-invalid @enderror" placeholder="Isi Keterangan tambahan (jika ada)" value="{{ old('description') }}">
                                                    @error('description')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input name="user_entry" id="user_entry" type="text" class="form-control @error('user_entry') is-invalid @enderror" placeholder="" value="{{ $user_entry }}" readonly hidden>
                                                    @error('user_entry')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    @foreach ($vehicle as $Vehicle)
                                                        <input name="id_asset" id="id_asset" type="text" class="form-control @error('id_asset') is-invalid @enderror" placeholder="" value="{{ $Vehicle->id }}" readonly hidden>
                                                    @endforeach
                                                    @error('id_asset')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input name="id_journal" id="id_journal" type="text" class="form-control @error('id_journal') is-invalid @enderror" placeholder="" value="<?php echo getAsset($n) ?>" readonly hidden>
                                                    @error('id_journal')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
										</div>
										<div class="modal-footer no-bd">
											<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
											<button type="submit" id="addRowButton" class="btn btn-primary">Tambah</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection