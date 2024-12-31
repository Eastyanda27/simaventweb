<?php
    $n=16;
	$m=6;
	if (!function_exists('getVehicle'))
	{
		function getVehicle($n) {
			$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$randomString = '';
	
			for ($i = 0; $i < $n; $i++) {
				$index = rand(0, strlen($characters) - 1);
				$randomString .= $characters[$index];
			}
	
			return $randomString;
		}
	}

	if (!function_exists('getCategoryVehicle'))
	{
		function getCategoryVehicle($m) {
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
						<h4 class="page-title">Aset Kendaraan</h4>
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
											data-target="#addRowCategory">
											<i class="bi bi-plus-lg"></i>
											Sub-Kategori
										</button>
                                        <button class="btn btn-primary btn-round ml-2" data-toggle="modal"
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
															Aset Kendaraan
														</span>
													</h3>
													<button type="button" class="close" data-dismiss="modal"
														aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form id="multiStepForm" action="/kendaraan" method="POST" enctype="multipart/form-data">
														@csrf
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Sub-Kategori</label>
																	<select name="sub_category" id="sub_category" class="form-control @error('sub_category') @enderror">
																		<option value="">Pilih</option>
																		@foreach ($sub_category as $sub_category)
																			<option value="{{ $sub_category->id }}">{{ $sub_category->sub_category }}</option>
																		@endforeach
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
																	<label>Nama Aset *</label>
																	<input name="asset_name" id="asset_name" type="text" class="form-control @error('asset_name') is-invalid @enderror" placeholder="Isi Nama Aset" value="{{ old('asset_name') }}" required>
																	@error('asset_name')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Plat Nomor Kendaraan</label>
																	<input name="number_plate" id="number_plate" type="text" class="form-control @error('number_plate') is-invalid @enderror" placeholder="Isi Plat No Kendaraan" value="{{ old('number_plate') }}">
																	@error('number_plate')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Merk Kendaraan *</label>
																	<input name="brand" id="brand" type="text" class="form-control @error('brand') is-invalid @enderror" placeholder="(misal: Honda)" value="{{ old('brand') }}" required>
																	@error('brand')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Model *</label>
																	<input name="type" id="type" type="text" class="form-control @error('type') is-invalid @enderror" placeholder="(misal: Brio/Scoppy)" value="{{ old('type') }}" required>
																	@error('type')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Ukuran CC</label>
																	<input name="cc_size" id="cc_size" type="number" class="form-control @error('cc_size') is-invalid @enderror" placeholder="(misal: 500cc)" value="{{ old('cc_size') }}">
																	@error('cc_size')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>No Rangka</label>
																	<input name="frame_number" id="frame_number" type="text" class="form-control @error('frame_number') is-invalid @enderror" placeholder="Isi No Rangka Kendaraan" value="{{ old('frame_number') }}">
																	@error('frame_number')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>No Mesin</label>
																	<input name="machine_number" id="machine_number" type="text" class="form-control @error('machine_number') is-invalid @enderror" placeholder="Isi No Mesin" value="{{ old('machine_number') }}">
																	@error('machine_number')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>No BPKB</label>
																	<input name="bpkb_number" id="bpkb_number" type="text" class="form-control @error('bpkb_number') is-invalid @enderror" placeholder="Isi No BPKB" value="{{ old('bpkb_number') }}">
																	@error('bpkb_number')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Warna Kendaraan</label>
																	<input name="color" id="color" type="text" class="form-control @error('color') is-invalid @enderror" placeholder="Isi Warna Kendaraan" value="{{ old('color') }}" required>
																	@error('color')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Tahun Pembuatan *</label>
																	<input name="production_year" id="production_year" type="text" class="form-control @error('production_year') is-invalid @enderror" placeholder="Isi Tahun Pembuatan" value="{{ old('production_year') }}" required>
																	@error('production_year')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label for="price">Harga</label>
																	<input name="price" id="price" type="number" class="form-control @error('price') is-invalid @enderror" placeholder="Isi Harga Barang" value="{{ old('price') }}" required>
																	@error('price')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label for="residual_price">Nilai Sisa</label>
																	<input name="residual_price" id="residual_price" type="number" class="form-control @error('residual_price') is-invalid @enderror" placeholder="Isi Nilai Sisa" value="{{ old('residual_price') }}" required>
																	@error('residual_price')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label for="economic_life">Umur Ekonomi</label>
																	<input name="economic_life" id="economic_life" type="number" class="form-control @error('economic_life') is-invalid @enderror" placeholder="Isi Umur Ekonomis" value="{{ old('economic_life') }}" required>
																	@error('economic_life')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Keterangan Tambahan</label>
																	<input name="description" id="description" type="text" class="form-control @error('description') is-invalid @enderror" placeholder="Isi Keterangan (jika ada)" value="{{ old('description') }}">
																	@error('description')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Penanggung Jawab Aset *</label>
																	<select name="asset_holder" id="asset_holder" class="form-control @error('asset_holder') @enderror" required>
																		<option value="">Pilih</option>
																		@foreach ($asset_holder as $Asset_holder)
																			<option value="{{ $Asset_holder->id }}">{{ $Asset_holder->employee_name }}</option>
																		@endforeach
																	</select>
																	@error('asset_holder')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Gambar</label>
																	<input name="image" id="image" type="file" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}">
																	@error('image')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group">
																	<input name="image_category" id="image_category" type="text" class="form-control @error('image_category') is-invalid @enderror" placeholder="" value="Profil" readonly hidden>
																	@error('image_category')
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
																	<input name="asset_category" id="asset_category" type="text" class="form-control @error('asset_category') is-invalid @enderror" placeholder="" value="kendaraan" readonly hidden>
																	@error('asset_category')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group">
																	<input name="id_asset" id="id_asset" type="text" class="form-control @error('id_asset') is-invalid @enderror" placeholder="" value="<?php echo getVehicle($n) ?>" readonly hidden>
																	@error('id_asset')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group">
																	<input name="method" id="method" type="text" class="form-control @error('method') is-invalid @enderror" placeholder="" value="Garis Lurus" readonly hidden>
																	@error('method')
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
									<!-- Modal -->
									<div class="modal fade" id="addRowCategory" tabindex="-1" role="dialog"
										aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h3 class="modal-title">
														<span class="fw-mediumbold">
															Tambah</span>
														<span class="fw-light">
															Sub-Kategori
														</span>
													</h3>
													<button type="button" class="close" data-dismiss="modal"
														aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form action="/kategorikendaraan" method="POST">
														@csrf
														<div class="row">
															<div class="col-sm-12">
                                                                <div class="form-group form-group-default">
																	<label>Nama Sub-Kategori *</label>
                                                                    <input name="sub_category" id="sub_category" type="text" class="form-control @error('sub_category') is-invalid @enderror" placeholder="Isi Sub-Kategori" value="{{ old('sub_category') }}" required>
																	@error('sub_category')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group form-group-default">
																	<label>Keterangan</label>
                                                                    <input name="description" id="description" type="text" class="form-control @error('description') is-invalid @enderror" placeholder="Isi Keterangan" value="{{ old('description') }}">
																	@error('description')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
                                                                </div>
                                                            </div>
															<div class="col-sm-12">
																<div class="form-group">
																	<input name="asset_category" id="asset_category" type="text" class="form-control @error('asset_category') is-invalid @enderror" placeholder="" value="kendaraan" readonly hidden>
																	@error('asset_category')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group">
																	<input name="id_category" id="id_category" type="text" class="form-control @error('id_category') is-invalid @enderror" placeholder="" value="<?php echo getCategoryVehicle($m) ?>" readonly hidden>
																	@error('id_category')
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

									@if ($vehicle->count())
									<div class="table-responsive">
										@include('tabelkendaraan')
									</div>
									<div class="d-flex justify-content-end mt-3">
										{{ $vehicle->links() }}
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