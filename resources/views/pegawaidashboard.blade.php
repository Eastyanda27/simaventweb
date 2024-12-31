@extends('/main')

@section("container")
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								@if(session()->has('success'))
        							<div class="alert alert-success col-lg-12" role="alert">
            							{{ session('success') }}
        							</div>
								@endif
								@auth
								<h2 class="text-white pb-2 fw-bold">Selamat Datang di Simavent</h2>
								<h3 class="text-white op-7 mb-2">Sistem Informasi Manajemen Inventaris</h3>
								<h3 class="text-white op-7 mb-2">Dinas Komunikasi dan Informatika Kabupaten Kerinci</h3>
								@endauth
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-6 d-flex align-items-stretch">
							<div class="card flex-fill">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">Statistik</div>
										<div class="card-tools">
											<div class="dropdown">
												<button class="btn btn-secondary dropdown-toggle text-white btn-round" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													Pilih Periode
												</button>
												<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
													<a class="dropdown-item" href="#pills-today" data-toggle="pill" role="tab" aria-selected="true">Today</a>
													<a class="dropdown-item" href="#pills-week" data-toggle="pill" role="tab" aria-selected="false">Week</a>
													<a class="dropdown-item" href="#pills-month" data-toggle="pill" role="tab" aria-selected="false">Month</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card-body">
									{!! $vehiclechart->container() !!}
								</div>
							</div>
						</div>
						<div class="col-md-6 d-flex align-items-stretch">
							<div class="card flex-fill">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">Statistik</div>
										<div class="card-tools">
											<div class="dropdown">
												<button class="btn btn-secondary dropdown-toggle text-white btn-round" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													Pilih Periode
												</button>
												<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
													<a class="dropdown-item" href="#pills-today" data-toggle="pill" role="tab" aria-selected="true">Today</a>
													<a class="dropdown-item" href="#pills-week" data-toggle="pill" role="tab" aria-selected="false">Week</a>
													<a class="dropdown-item" href="#pills-month" data-toggle="pill" role="tab" aria-selected="false">Month</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card-body">
									{!! $vehiclechart->container() !!}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<script src="{{ $vehiclechart->cdn() }}"></script>

			{{ $vehiclechart->script() }}
@endsection