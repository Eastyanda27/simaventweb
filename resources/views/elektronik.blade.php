<?php
    $n=16;
	$m=6;
	if (!function_exists('getElectronic'))
	{
		function getElectronic($n) {
			$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$randomString = '';
	
			for ($i = 0; $i < $n; $i++) {
				$index = rand(0, strlen($characters) - 1);
				$randomString .= $characters[$index];
			}
	
			return $randomString;
		}
	}

	if (!function_exists('getCategoryElectronic'))
	{
		function getCategoryElectronic($m) {
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
						<h4 class="page-title">Aset Elektronik dan Mesin</h4>
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
															Aset Elektronik dan Mesin
														</span>
													</h3>
													<button type="button" class="close" data-dismiss="modal"
														aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form action="/elektronik" method="POST">
														@csrf
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label for="asset_category">Kategori</label>
																	<select name="asset_category" id="asset_category" class="form-control @error('asset_category') @enderror" required>
																		<option value="">--Pilih Kategori--</option>
																		<option value="elektronik">Elektronik</option>
																		<option value="mesin">Mesin</option>
																	</select>
																	@error('asset_category')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label for="sub_category">Sub-Kategori</label>
                                                                    <select name="sub_category" id="sub_category" class="form-control @error('sub_category') @enderror" required>
																		<option value="">--Pilih Subkategori--</option>
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
																	<label for="asset_name">Nama Aset *</label>
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
																	<label for="brand">Merk</label>
                                                                    <input name="brand" id="brand" type="text" class="form-control @error('brand') is-invalid @enderror" placeholder="Isi Merk Barang" value="{{ old('brand') }}" required>
																	@error('brand')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
                                                                </div>
                                                            </div>
															<div class="col-sm-12">
                                                                <div class="form-group form-group-default">
																	<label for="type">Model</label>
                                                                    <input name="type" id="type" type="text" class="form-control @error('type') is-invalid @enderror" placeholder="Isi Model Barang" value="{{ old('type') }}" required>
																	@error('type')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
                                                                </div>
                                                            </div>
															<div class="col-sm-12">
                                                                <div class="form-group form-group-default">
																	<label for="specification">Spesifikasi</label>
                                                                    <input name="specification" id="specification" type="text" class="form-control @error('specification') is-invalid @enderror" placeholder="Isi Spesifikasi Barang" value="{{ old('specification') }}" required>
																	@error('specification')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
                                                                </div>
                                                            </div>
															<div class="col-md-4">
                                                                <div class="form-group form-group-default">
																	<label for="warranty_period">Masa Garansi</label>
                                                                    <input name="warranty_period" id="warranty_period" type="number" class="form-control @error('warranty_period') is-invalid @enderror" placeholder="Isi Masa Garansi Barang" value="{{ old('warranty_period') }}">
																	@error('warranty_period')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
                                                                </div>
                                                            </div>
															<div class="col-md-4">
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
															<div class="col-md-4">
                                                                <div class="form-group form-group-default">
																	<label for="quantity">Jumlah Barang</label>
                                                                    <input name="quantity" id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" placeholder="Isi Jumlah Barang" value="{{ old('quantity') }}" required>
																	@error('quantity')
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
																	<input name="id_asset" id="id_asset" type="text" class="form-control @error('id_asset') is-invalid @enderror" placeholder="" value="<?php echo getElectronic($n) ?>" readonly hidden>
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
													<form action="/kategorielektronik" method="POST">
														@csrf
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label for="asset_category">Sub-Kategori *</label>
																	<select name="asset_category" id="asset_category" class="form-control @error('asset_category') @enderror" required>
																		<option value="">Pilih</option>
																		<option value="elektronik">Elektronik (Hp, Laptop, Tablet, dll)</option>
																		<option value="mesin">Mesin (Kulkas, Dispenser, dll)</option>
																	</select>
																	@error('asset_category')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
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
																	<input name="id_category" id="id_category" type="text" class="form-control @error('id_category') is-invalid @enderror" placeholder="" value="<?php echo getCategoryElectronic($m) ?>" readonly hidden>
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

									@if ($electronic->count())
									<div class="table-responsive">
										@include('tabelelektronik')
									</div>
									<div class="d-flex justify-content-end mt-3">
										{{ $electronic->links() }}
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