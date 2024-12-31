<?php
    // Menghitung bulan sebelumnya dan bulan selanjutnya
    $prevMonth = Carbon\Carbon::create($year, $month)->subMonth();
    $nextMonth = Carbon\Carbon::create($year, $month)->addMonth();
?>

@extends('/main')

@section("container")
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Kalender Aset</h4>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<div class="col-md-4">
										</div>
										<div class="calendar-navigation ml-auto">
											<a href="{{ route('kalender', ['month' => $prevMonth->month, 'year' => $prevMonth->year]) }}"><<<</a>
											<span>-- {{ Carbon\Carbon::create($year, $month)->format('F Y') }} --</span>
											<a href="{{ route('kalender', ['month' => $nextMonth->month, 'year' => $nextMonth->year]) }}">>>></a>
										</div>
									</div>
								</div>
								<div class="card-body">
                                    @if ($schedules->count())
									<div class="table-responsive">
										@include('tabelkalender')
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