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
						<div class="col-md-12">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Dashboard</div>
									<div class="card-category mb-3"></div>
									<div class="row">
										<div class="col-md-4">
											<div class="card card-dark bg-primary-gradient">
												<div class="card-body pb-0">
													<div class="h1 fw-bold float-right">-3%</div>
													<h2 class="mb-2 text-white">{{ $asset }}</h2>
													<p>Jumlah Aset</p>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="card card-dark bg-secondary-gradient">
												<div class="card-body pb-0">
													<div class="h1 fw-bold float-right">-3%</div>
													<h2 class="mb-2 text-white">27</h2>
													<p>New Users</p>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="card card-dark bg-success2">
												<div class="card-body pb-0">
													<div class="h1 fw-bold float-right">+7%</div>
													<h2 class="mb-2 text-white">{{ $user }}</h2>
													<p>Jumlah User/Pegawai</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row mt-2">
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
										<div class="card-title">Log Activity</div>
										<div class="card-tools">
											<ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-sm" id="pills-tab" role="tablist">
												<li class="nav-item">
													<a class="nav-link" id="pills-today" data-toggle="pill" href="#pills-today" role="tab" aria-selected="true">Hari Ini</a>
												</li>
												<li class="nav-item">
													<a class="nav-link active" id="pills-week" data-toggle="pill" href="#pills-week" role="tab" aria-selected="false">Minggu Ini</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="pills-month" data-toggle="pill" href="#pills-month" role="tab" aria-selected="false">Bulan Ini</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="card-body">
									@foreach($activities as $activity)
										<div class="d-flex">
											<div class="flex-1 ml-3 pt-1">
												<h6 class="text-uppercase fw-bold mb-1">{{ $activity->description }}</h6>
												<span class="text-muted">oleh: {{ $activity->employee_name }}</span><br>
												<span class="text-muted">detail aset: {{ $activity->properties['id_asset'] }} - {{ $activity->properties['asset_name'] }}</span>
											</div>
											<div class="float-right pt-1">
												<small class="text-muted">8:40 PM</small>
											</div>
										</div>
										<div class="separator-solid"></div>
									@endforeach
								</div>
							</div>
						</div>
					</div>					
					<div class="row mt-2">
						<div class="col-md-6 d-flex align-items-stretch">
							<div class="card flex-fill">
								<div class="card-header">
									<div class="card-title">Kalender</div>
								</div>
								<div class="card-body">
									<h5 class="card-title">November 2024</h5>
									<p class="card-text">Upcoming Events:</p>
									<div class="row">
										<div class="col-12">
											<div class="btn-group float-right">
												<div class="calendar-navigation ml-auto">
													<a href=""><<<</a>
													<span>--  --</span>
													<a href="">>>></a>
												</div>
											</div>
										</div>
									</div>
									<div class="row mt-3">
										<div class="col-12">
											<table class="table table-bordered">
												<thead>
													<tr>
														<th>S</th>
														<th>M</th>
														<th>T</th>
														<th>W</th>
														<th>T</th>
														<th>F</th>
														<th>S</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>27</td>
														<td>28</td>
														<td>29</td>
														<td>30</td>
														<td>31</td>
														<td>1</td>
														<td>2</td>
													</tr>
													<tr>
														<td>3</td>
														<td>4</td>
														<td>5</td>
														<td>6</td>
														<td>7</td>
														<td>8</td>
														<td>9</td>
													</tr>
													<tr>
														<td>10</td>
														<td>11</td>
														<td>12</td>
														<td>13</td>
														<td>14</td>
														<td>15</td>
														<td>16</td>
													</tr>
													<tr>
														<td>17</td>
														<td>18</td>
														<td>19</td>
														<td>20</td>
														<td>21</td>
														<td>22</td>
														<td>23</td>
													</tr>
													<tr>
														<td>24</td>
														<td>25</td>
														<td>26</td>
														<td>27</td>
														<td>28</td>
														<td>29</td>
														<td>30</td>
													</tr>
													<tr>
														<td>31</td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<script src="{{ $vehiclechart->cdn() }}"></script>

			{{ $vehiclechart->script() }}
@endsection