<?php
    $n=16;
	if (!function_exists('getName'))
	{
		function getName($n) {
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
						<h4 class="page-title">Data Pegawai</h4>
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
											Tambah Akun
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
															Akun
														</span>
													</h3>
													<button type="button" class="close" data-dismiss="modal"
														aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<form action="/user" method="POST">
														@csrf
														<div class="row">
															<div class="col-sm-12">
                                                                <div class="form-group form-group-default">
																	<label>Email</label>
                                                                    <input name="email" id="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Isi Email" value="{{ old('email') }}" required>
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
                                                                    <input name="employee_name" id="employee_name" type="text" class="form-control @error('employee_name') is-invalid @enderror" placeholder="Isi Nama Lengkap Pegawai" value="{{ old('employee_name') }}" required>
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
                                                                    <input name="nip" id="nip" type="text" class="form-control @error('nip') is-invalid @enderror" placeholder="Isi NIP" value="{{ old('nip') }}">
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
                                                                        <option selected>Pilih</option>
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
															<div class="col-sm-12">
																<div class="form-group">
																	<input name="password" id="password" type="text" class="form-control @error('password') is-invalid @enderror" placeholder="" value="12345678" readonly hidden>
																	@error('password')
																	<div class="invalid-feedback">
																		{{ $message }}
																	</div>
																	@enderror
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group">
																	<input name="id_user" id="id_user" type="text" class="form-control @error('id_user') is-invalid @enderror" placeholder="" value="<?php echo getName($n) ?>" readonly hidden>
																	@error('id_user')
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
									
									@if ($employee->count())
									<div class="table-responsive">
										@include('tabelpegawai')
									</div>
									<div class="d-flex justify-content-end mt-3">
										{{ $employee->links() }}
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