<?php
    $n=16;
	if (!function_exists('getReport'))
	{
		function getReport($n) {
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
						<h4 class="page-title">Laporan Kondisi Aset</h4>
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
                                        @if(auth()->user()->isStaff())
                                        <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
											data-target="#addRowModal">
											<i class="bi bi-plus-lg"></i>
											Tambah Data
										</button>
                                        @endif
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
															Data Laporan Kondisi Aset
														</span>
													</h3>
													<button type="button" class="close" data-dismiss="modal"
														aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form action="/inspeksi" method="POST" enctype="multipart/form-data">
														@csrf
														<div class="row">
                                                            <div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Bulan</label>
                                                                    <select name="month" id="month" class="form-control @error('month') @enderror" required>
																		<option value="">Pilih</option>
																		@foreach($month as $key => $Month)
                                                                            <option value="{{ $key }}">{{ $Month }}</option>
                                                                        @endforeach
                                                                    </select>
																	@error('month')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
                                                            <div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Tahun</label>
                                                                    <select name="year" id="year" class="form-control @error('year') @enderror" required>
																		<option value="">Pilih</option>
																		@for ($i = $endYear; $i >= $startYear; $i--)
                                                                            <option value="{{ $i }}">{{ $i }}</option>
                                                                        @endfor
                                                                    </select>
																	@error('year')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
                                                            <div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Asset</label>
                                                                    <select name="id_asset" id="id_asset" class="form-control @error('id_asset') @enderror" required>
																		<option value="">Pilih</option>
																		@foreach ($asset as $Asset)
                                                                        	<option value="{{ $Asset->id }}">{{ $Asset->id_asset }} - {{ $Asset->asset_name }}</option>
																		@endforeach
                                                                    </select>
																	@error('id_asset')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
                                                            <div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label for="condition">Kondisi *</label>
																	<select name="conditions" id="conditions" class="form-control @error('conditions') is-invalid @enderror" required>
																		<option value="">Pilih</option>
																		<option value="Sangat Baik">Sangat Baik</option>
																		<option value="Baik">Baik</option>
																		<option value="Rusak Ringan">Rusak Ringan</option>
																		<option value="Rusak Berat">Rusak Berat</option>
																	</select>
																	@error('conditions')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
                                                            <div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label for="message">Pesan Tambahan</label>
																	<input name="message" id="message" type="text" class="form-control @error('message') is-invalid @enderror" placeholder="(Jika Ada) misalnya menyarankan perbaikan/penggantian" value="{{ old('message') }}">
																	@error('message')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group form-group-default" id="image-input-container">
																	<label>Gambar Kondisi Aset</label>
                                                                    <input name="image[]" id="image" type="file" class="form-control @error('image') is-invalid @enderror" accept="image/*" value="{{ old('image') }}">
																	@error('image')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
                                                                </div>
                                                            </div>
                                                            <button type="button" id="add-image-input" class="ml-3">Tambah Gambar</button>
                                                            <div class="col-sm-12">
																<div class="form-group">
																	<input name="status" id="status" type="text" class="form-control @error('status') is-invalid @enderror" placeholder="" value="Menunggu Validasi Administrator" readonly hidden>
																	@error('status')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
                                                            <div class="col-sm-12">
																<div class="form-group">
																	<input name="id_report" id="id_report" type="text" class="form-control @error('id_report') is-invalid @enderror" placeholder="" value="<?php echo getReport($n) ?>" readonly hidden>
																	@error('id_report')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
                                                            <div class="col-sm-12">
																<div class="form-group">
                                                                    <input name="sender" id="sender" type="text" class="form-control @error('sender') is-invalid @enderror" placeholder="" value="{{ $sender }}" readonly hidden>
																	@error('sender')
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
									
                                    <div class="modal fade" id="addRowValidate" tabindex="-1" role="dialog"
										aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h3 class="modal-title">
														<span class="fw-mediumbold">
															Validasi</span>
														<span class="fw-light">
															Data Laporan Kondisi Aset
														</span>
													</h3>
													<button type="button" class="close" data-dismiss="modal"
														aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form action="/inspeksi-validate" method="POST" enctype="multipart/form-data">
														@csrf
														<div class="row">
                                                            <div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label for="reply_message">Pesan Tambahan</label>
																	<input name="reply_message" id="reply_message" type="text" class="form-control @error('reply_message') is-invalid @enderror" placeholder="Tambahkan pesan (jika ada)" value="{{ old('reply_message') }}">
																	@error('reply_message')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
                                                            <div class="col-sm-12">
																<div class="form-group">
																	<input name="kode_report" id="kode_report" type="text" class="form-control @error('kode_report') is-invalid @enderror" readonly hidden>
																	@error('kode_report')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
                                                            <div class="col-sm-12">
																<div class="form-group">
																	<input name="status" id="status" type="text" class="form-control @error('status') is-invalid @enderror" value="Disetujui" readonly hidden>
																	@error('status')
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

									@if ($inspeksi->count())
									<div class="table-responsive">
										@include('tabelinspeksi')
									</div>
									<div class="d-flex justify-content-end mt-3">
										{{ $inspeksi->links() }}
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