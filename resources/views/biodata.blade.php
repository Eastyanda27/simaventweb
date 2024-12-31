<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Simavent</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<meta name="csrf-token" content="{{ csrf_token() }}"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

	<!-- CSS Files -->
	<link href="{{asset('assets/css/bootstrap1.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/css/style.min.css')}}" rel="stylesheet" />
</head>

<body>
	<div class="wrapper">
		<div class="main-header">
			@include('/navbar')
		</div>

		

		<div class="main-panel">
			<div class="content">
				
			</div>
		</div>
	</div>
	<!--   Core JS Files   -->
	<script src="{{ asset('assets/js/jquery.3.2.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{ asset('assets/js/jquery.scrollbar.min.js') }}"></script>

    <!-- jQuery UI -->
	<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.ui.touch-punch.min.js') }}"></script>

	<!-- Datatables -->
	<script src="{{ asset('assets/js/datatables.min.js') }}"></script>

    <!-- Chart JS -->
	<script src="{{ asset('assets/js/chart.min.js') }}"></script>

	<!-- jQuery Sparkline -->
	<script src="{{ asset('assets/js/jquery.sparkline.min.js') }}"></script>

	<!-- Chart Circle -->
	<script src="{{ asset('assets/js/circles.min.js') }}"></script>

	<!-- Atlantis JS -->
	<script src="{{ asset('assets/js/atlantis.min.js') }}"></script>
	
</body>

</html>