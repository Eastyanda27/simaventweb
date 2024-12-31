@extends('/main')

@section("container")
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Rekap Laporan Aset</h4>
						@if(auth()->user()->isAdmin())
							<button class="btn btn-primary ml-auto"><i class="bi bi-printer-fill"></i> Print</button>
						@endif
					</div>
					<div class="ml-auto">
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
									@if(auth()->user()->isAdmin())
										<div class="d-flex align-items-center">
											<div class="col-md-4">
												<div class="col-12">
													<h2>Data Laporan Aset</h2>
												</div>
											</div>
											<div class="ml-auto">
												<button class="btn btn-primary btn-round ml-auto"><i class="bi bi-printer-fill"></i> Print</button>
											</div>
										</div>
									@endif
								</div>
								<div class="card-body">
                                    <!-- Modal -->
									<div class="modal fade" id="addRowReport" tabindex="-1" role="dialog"
										aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h3 class="modal-title">
														<span class="fw-mediumbold">
															Kirim</span>
														<span class="fw-light">
															Laporan Aset
														</span>
													</h3>
													<button type="button" class="close" data-dismiss="modal"
														aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form action="/laporan" method="POST" enctype="multipart/form-data">
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
																	<label for="notes">Pesan Tambahan</label>
																	<input name="notes" id="notes" type="text" class="form-control @error('notes') is-invalid @enderror" placeholder="Tambahkan catatan (jika ada)" value="{{ old('notes') }}">
																	@error('notes')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group">
																	<input name="status" id="status" type="text" class="form-control @error('status') is-invalid @enderror" placeholder="" value="Menunggu Validasi Kepala Bidang" readonly hidden>
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

									@if ($vehicle->count())
									<div class="table-responsive">
										@include('tabellaporan')
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
						@if(auth()->user()->isAdmin())
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<div class="d-flex align-items-center">
											<div class="col-md-4">
												<div class="col-12">
													<h2>Aset Kendaraan</h2>
												</div>
											</div>
											<div class="ml-auto">
												<form action="/kendaraan/print" method="POST">
													@csrf
													<button class="btn btn-primary btn-round ml-auto"><i class="bi bi-printer-fill"></i> Print</button>
												</form>
											</div>
										</div>
									</div>
									<div class="card-body">
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
							<div class="ml-auto mr-3">
								<button class="btn btn-primary ml-2" data-toggle="modal"
									data-target="#addRowReport">
									Kirim Laporan
								</button>
							</div>
						@endif
					</div>
				</div>
@endsection