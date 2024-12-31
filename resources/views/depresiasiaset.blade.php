@extends('/main')

@section("container")
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Depresiasi Aset</h4>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<div class="col-md-4">
											<form action="">
												<div class="input-group">
													<input type="text" class="form-control" placeholder="Search.." name="search" value="{{ old('search') }}">
													<button class="btn btn-primary" type="submit">Search</button>
												</div>
											</form>
										</div>
									</div>
								</div>
								<div class="card-body">
                                    @if ($depreciation->count())
									<div class="table-responsive">
										@include('tabeldepresiasi')
									</div>
                                    <div class="d-flex justify-content-end mt-3">
										{{ $depreciation->links() }}
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