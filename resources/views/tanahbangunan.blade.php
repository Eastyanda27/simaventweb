<?php
    $n=16;
	$m=6;
	if (!function_exists('getBuilding'))
	{
		function getBuilding($n) {
			$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$randomString = '';
	
			for ($i = 0; $i < $n; $i++) {
				$index = rand(0, strlen($characters) - 1);
				$randomString .= $characters[$index];
			}
	
			return $randomString;
		}
	}

	if (!function_exists('getCategoryBuilding'))
	{
		function getCategoryBuilding($m) {
			$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$randomString = '';
	
			for ($i = 0; $i < $m; $i++) {
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
						<h4 class="page-title">Aset Tanah & Bangunan</h4>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									@if(session()->has('success'))
										<div class="alert alert-success col-lg-12" role="alert">
											{{ session('success') }}
										</div>
									@endif
									<div class="d-flex align-items-center">
										<div class="col-md-4">
											<form action="">
												<div class="input-group">
													<input type="text" class="form-control" placeholder="Search.." name="search" value="{{ old('search') }}">
													<button class="btn btn-primary" type="submit">Search</button>
												</div>
											</form>
										</div>
                                        <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
											data-target="#addRowModal">
											<i class="bi bi-plus-lg"></i>
											Tambah Data
										</button>
									</div>
								</div>
								<div class="card-body">
                                    <!-- Modal -->
									<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog"
										aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h3 class="modal-title">
														<span class="fw-mediumbold">
															Tambah</span>
														<span class="fw-light">
															Aset Tanah & Bangunan
														</span>
													</h3>
													<button type="button" class="close" data-dismiss="modal"
														aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form action="/tanahbangunan" method="POST">
														@csrf
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label for="sub_category">Sub-Kategori *</label>
																	<select name="sub_category" id="sub_category" class="form-control @error('sub_category') @enderror" required>
																		<option value="">Pilih</option>
																		<option value="Tanah">Tanah</option>
																		<option value="Bangunan">Bangunan</option>
																	</select>
																	@error('sub_category')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label for="asset_name">Nama *</label>
																	<input name="asset_name" id="asset_name" type="text" class="form-control @error('asset_name') is-invalid @enderror" placeholder="Isi Nama Aset" value="{{ old('asset_name') }}" required>
																	@error('asset_name')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label for="size">size (m2) *</label>
																	<input name="size" id="size" type="number" class="form-control @error('size') is-invalid @enderror" placeholder="Isi Luas Tanah/Bangunan" value="{{ old('size') }}" required>
																	@error('size')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label for="rights_status">Status Hak Tanah *</label>
																	<select name="rights_status" id="rights_status" class="form-control @error('rights_status') is-invalid @enderror" required>
																		<option value="">Pilih</option>
																		<option value="Hak Milik">Sertifikat Hak Milik (SHM)</option>
																		<option value="Hak Guna Bangunan">Sertifikat Hak Guna Bangunan (HGB)</option>
																		<option value="Hak Guna Usaha">Sertifikat Hak Guna Usaha (HGU)</option>
																		<option value="Hak Pakai">Sertifikat Hak Pakai (HP)</option>
																	</select>
																	@error('rights_status')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label for="address">Alamat *</label>
																	<input name="address" id="address" type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Isi Alamat Tanah/Bangunan" value="{{ old('address') }}" required>
																	@error('address')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label for="subdistrict">Kecamatan</label>
																	<select name="subdistrict" id="subdistrict" class="form-control @error('subdistrict') is-invalid @enderror" required>
																		<option value="">Pilih</option>
																		<option value="Air Hangat">Air Hangat</option>
																		<option value="Air Hangat Barat">Air Hangat Barat</option>
																		<option value="Air Hangat Timur">Air Hangat Timur</option>
																		<option value="Batang Merangin">Batang Merangin</option>
																		<option value="Bukit Kerman">Bukit Kerman</option>
																		<option value="Danau Kerinci">Danau Kerinci</option>
																		<option value="Danau Kerinci Barat">Air</option>
																		<option value="Depati Tujuh">Depati Tujuh</option>
																		<option value="Gunung Kerinci">Gunung Kerinci</option>
																		<option value="Gunung Raya">Gunung Raya</option>
																		<option value="Gunung Tujuh">Gunung Tujuh</option>
																		<option value="Kayu Aro">Kayu Aro</option>
																		<option value="Kayu Aro Barat">Air</option>
																		<option value="Keliling Danau">Keliling Danau</option>
																		<option value="Sitinjau Laut">Sitinjau Laut</option>
																		<option value="Siulak">Siulak</option>
																		<option value="Siulak Mukai">Siulak Mukai</option>
																		<option value="Tanah Cogok">Tanah Cogok</option>
																	</select>
																	@error('subdistrict')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label for="village">Kelurahan/Desa</label>
																	<select name="village" id="village" class="form-control @error('village') is-invalid @enderror" required>
																		<option value="">Pilih</option>
																		<option value="Sungai Pegeh">Sungai Pegeh</option>
																	</select>
																	@error('village')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label for="condition">Kondisi *</label>
																	<select name="condition" id="condition" class="form-control @error('condition') is-invalid @enderror" required>
																		<option value="">Pilih</option>
																		<option value="Sangat Baik">Sangat Baik</option>
																		<option value="Baik">Baik</option>
																		<option value="Rusak Ringan">Rusak Ringan</option>
																		<option value="Rusak Berat">Rusak Berat</option>
																	</select>
																	@error('condition')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label for="certificate_date">Tanggal Sertifikat *</label>
																	<input name="certificate_date" id="certificate_date" type="date" class="form-control @error('certificate_date') is-invalid @enderror" placeholder="Isi Tanggal Sertifikat Tanah/Bangunan" value="{{ old('certificate_date') }}" required>
																	@error('certificate_date')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label for="certificate_number">Nomor Sertifikat *</label>
																	<input name="certificate_number" id="certificate_number" type="text" class="form-control @error('certificate_number') is-invalid @enderror" placeholder="Isi No Sertifikat Tanah/Bangunan" value="{{ old('certificate_number') }}" required>
																	@error('certificate_number')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label for="origin">Asal Usul</label>
																	<select name="origin" id="origin" class="form-control @error('origin') is-invalid @enderror" required>
																		<option value="">Pilih</option>
																		<option value="Pembelian">Pembelian</option>
																		<option value="Hibah">Hibah</option>
																	</select>
																	@error('origin')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label for="price">Harga</label>
																	<input name="price" id="price" type="number" class="form-control @error('price') is-invalid @enderror" placeholder="Isi Harga Tanah/Bangunan" value="{{ old('price') }}" required>
																	@error('price')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label for="useful_life">Masa Manfaat (tahun)</label>
																	<input name="useful_life" id="useful_life" type="number" class="form-control @error('useful_life') is-invalid @enderror" placeholder="hanya untuk aset bangunan" value="{{ old('useful_life') }}">
																	@error('useful_life')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label for="use_for">Penggunaan</label>
																	<input name="use_for" id="use_for" type="text" class="form-control @error('use_for') is-invalid @enderror" placeholder="Isi Penggunaan Tanah/Bangunan" value="{{ old('use_for') }}" required>
																	@error('use_for')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-sm-12">
                                                                <div class="form-group form-group-default">
																	<label>Keterangan</label>
                                                                    <input name="description" id="description" type="text" class="form-control @error('description') is-invalid @enderror" placeholder="Isi Keterangan (jika ada)" value="{{ old('description') }}">
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
																	<input name="id_category" id="id_category" type="text" class="form-control @error('id_category') is-invalid @enderror" placeholder="" value="<?php echo getCategoryBuilding($m) ?>" readonly hidden>
																	@error('id_category')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group">
																	<input name="asset_category" id="asset_category" type="text" class="form-control @error('asset_category') is-invalid @enderror" placeholder="" value="tanah & bangunan" readonly hidden>
																	@error('asset_category')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group">
																	<input name="id_asset" id="id_asset" type="text" class="form-control @error('id_asset') is-invalid @enderror" placeholder="" value="<?php echo getBuilding($n) ?>" readonly hidden>
																	@error('id_asset')
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

									@if ($building->count())
									<div class="table-responsive">
										@include('tabeltanahbangunan')
									</div>
									<div class="d-flex justify-content-end mt-3">
										{{ $building->links() }}
									</div>
								</div>
								@else
								<p class="text-center fs-4">Data Tidak Ditemukan</p>
								@endif
							</div>
						</div>
					</div>
				</div>
@endsection