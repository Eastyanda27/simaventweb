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
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

	<!-- CSS Files -->
	<link href="{{asset('assets/css/bootstrap1.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/css/style.min.css')}}" rel="stylesheet" />
	
<style>
    /* Navbar custom warna */
    .navbar {
        background-color: #f8fdff;
    }
    .navbar-brand {
        color: #0a6ebd !important;
        font-weight: bold;
    }

    /* Title warna biru tua */
    h2 {
        color: #0077b6;
        font-size: 20px;
        font-weight: bold;
    }

    /* Styling untuk Data Aset */
    .card {
        background-color: #ffffff; /* Latar belakang card putih */
        border: 1px solid #d6eaf8;
        border-radius: 8px;
    }

    /* Hanya judul card yang berwarna biru */
    .card-header {
        background-color: #0077b6;
        color: #0077b6;
        font-weight: bold;
		font-size: 16px;
    }

	.card-body p {
    margin-bottom: 0.5rem; /* Memberikan jarak antar elemen */
	}

    /* Foto & QR Code Section */
    .qr-section img {
        width: 100px;
        height: 100px;
    }

    /* Tab navigation */
    .nav-tabs .nav-link {
        color: #0077b6;
        border-radius: 0;
        border-color: #d6eaf8;
    }
    .nav-tabs .nav-link.active {
        background-color: #0077b6;
        color: #fff;
    }

    /* Back button */
    .btn-secondary {
        background-color: #d2eef6;
        border-color: #d2eef6;
        color: #0077b6;
    }

	/* CSS */
	.steps-container .step {
		display: none;
		transition: transform 0.3s ease-in-out;
	}

	.steps-container .active-step {
		display: block;
	}


    /* Layout mobile */
    @media (max-width: 768px) {
        .card {
            padding: 10px;
        }
        .qr-section img {
            width: 80px;
            height: 80px;
        }
        h2 {
            font-size: 20px;
        }
    }
</style>
</head>

<body>
	<div class="wrapper">
		<div class="main-header">
			@include('/navbar')
		</div>

        @if(auth()->user()->isAdmin())
    		@include('adminsidebar')
		@else
    		@include('pegawaisidebar')
		@endif

		<div class="main-panel">
			<div class="content">
				@yield('container')
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

	<!-- Bootstrap JS and dependencies -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> 

	<script>
		$(document).ready(function() {
			$('#asset_category').on('change', function() {
				var category = $(this).val(); // Mendapatkan nilai kategori yang dipilih
				
				// Kosongkan select2 saat kategori berubah
				$('#sub_category').empty();
				$('#sub_category').append('<option value="">--Pilih Subkategori--</option>');
	
				if (category) {
					$.ajax({
						url: '/get-subcategories/' + category, // URL untuk mengambil subkategori
						type: 'GET',
						success: function(data) {
							// Tambahkan opsi subkategori ke sub_category
							$.each(data, function(key, value) {
								$('#sub_category').append('<option value="' + value.id + '">' + value.sub_category + '</option>');
							});
						}
					});
				}
			});
		});
	</script>

	<script>
		function showInputFields() {
			// Ambil nilai dari select
			var assetType = document.getElementById("type").value;
			
			// Sembunyikan semua input fields terlebih dahulu
			document.getElementById("weeklyinput").style.display = "none";
			document.getElementById("monthlyinput").style.display = "none";
			document.getElementById("custominput").style.display = "none";
			
			// Tampilkan input fields sesuai dengan pilihan yang dipilih
			if (assetType === "Mingguan") {
				document.getElementById("weeklyinput").style.display = "block";
			} else if (assetType === "Bulanan") {
				document.getElementById("monthlyinput").style.display = "block";
			} else if (assetType === "Kustom") {
				document.getElementById("custominput").style.display = "block";
			}
		}
	</script>
	
	<script>
		var map = L.map('map').setView([-6.200000, 106.816666], 17); // Posisi default Jakarta (zoom level 10)
	
		// Memuat tile dari OpenStreetMap
		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
		}).on('load', function() {
			document.getElementById('loading').style.display = 'none'; // Sembunyikan loading indicator setelah peta dimuat
			document.getElementById('map').style.display = 'block'; // Tampilkan peta
		}).addTo(map);
	
		var marker;
	
		// Fungsi untuk validasi koordinat
		function isValidLatLon(lat, lon) {
			return lat >= -90 && lat <= 90 && lon >= -180 && lon <= 180;
		}
	
		// Fungsi untuk mendapatkan lokasi pengguna dan memusatkan peta
		function centerMapOnUserLocation() {
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(function(position) {
					var lat = position.coords.latitude;
					var lon = position.coords.longitude;
	
					// Validasi koordinat
					if (isValidLatLon(lat, lon)) {
						// Update nilai form untuk dikirim ke server
						document.getElementById('latitude').value = lat;
						document.getElementById('longitude').value = lon;
	
						// Jika marker sudah ada, hapus dulu sebelum menambahkan yang baru
						if (marker) {
							map.removeLayer(marker);
						}
	
						// Tambahkan marker baru di lokasi pengguna dan pusatkan peta
						marker = L.marker([lat, lon]).addTo(map)
							.bindPopup("Lokasi Anda saat ini").openPopup();
						map.setView([lat, lon], 17); // Atur zoom ke level 13
					} else {
						console.error("Koordinat tidak valid: " + lat + ", " + lon);
					}
				}, function(error) {
					console.error("Geolocation gagal: " + error.message);
				}, {
					enableHighAccuracy: true, // Mengaktifkan akurasi tinggi
					timeout: 5000, // Waktu maksimal untuk mendapatkan lokasi
					maximumAge: 0 // Jangan gunakan cache
				});
			} else {
				alert("Geolocation tidak didukung oleh browser ini.");
			}
		}
	
		// Fungsi yang dijalankan saat halaman pertama kali dimuat
		centerMapOnUserLocation();
	
		// Fungsi untuk memperbarui lokasi dan mengirim data ke server
		function getLocation() {
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(function(position) {
					var lat = position.coords.latitude;
					var lon = position.coords.longitude;
	
					// Validasi koordinat sebelum update
					if (isValidLatLon(lat, lon)) {
						// Update nilai form untuk dikirim ke server
						document.getElementById('latitude').value = lat;
						document.getElementById('longitude').value = lon;
	
						// Jika marker sudah ada, hapus dulu sebelum menambahkan yang baru
						if (marker) {
							map.removeLayer(marker);
						}
	
						// Tambahkan marker baru di lokasi pengguna dan pusatkan peta
						marker = L.marker([lat, lon]).addTo(map)
							.bindPopup("Lokasi Anda saat ini").openPopup();
						map.setView([lat, lon], 17); // Atur zoom ke level 13
	
						// Otomatis submit form ke server
						document.getElementById('location-form').submit();
					} else {
						console.error("Koordinat tidak valid: " + lat + ", " + lon);
					}
				}, function(error) {
					console.error("Geolocation gagal: " + error.message);
				}, {
					enableHighAccuracy: true, // Mengaktifkan akurasi tinggi
					timeout: 5000, // Waktu maksimal untuk mendapatkan lokasi
					maximumAge: 0 // Jangan gunakan cache
				});
			} else {
				alert("Geolocation tidak didukung oleh browser ini.");
			}
		}
	</script>

	<script>
		let imageCount = 1;

		function addImageInput() {
			imageCount++;
			const div = document.createElement('div');
			div.classList.add('image-input');
			div.innerHTML =
				`<div class="form-group form-group-default">
					<label>Lampiran</label>
					<div class="form-group form-group-default">
						<label for="image_${imageCount}">Pilih Gambar ${imageCount}:</label>
						<input type="file" name="images[]" required>
					</div>
				 </div>
				`;
			document.getElementById('imageInputs').appendChild(div);
		}
	</script>

	<script>
		document.getElementById('add-image-input').addEventListener('click', function() {
			let container = document.getElementById('image-input-container');
			let newInput = document.createElement('div');
			newInput.classList.add('mt-2');
			newInput.innerHTML = `<input name="image[]" type="file" class="form-control" accept="image/*" required>`;
			container.appendChild(newInput);
		});
	</script>

	<script>
		function openModal(idReport, event) {
			// Hentikan propagasi event
			event.stopPropagation();

			// Debug: cek apakah idReport diterima dengan benar
			console.log("ID Report: ", idReport);

			// Isi ID report ke dalam field dengan id="kode_report"
			document.getElementById('kode_report').value = idReport;

			// Debug: cek apakah field kode_report diisi dengan benar
			console.log("Field Kode Report Value: ", document.getElementById('kode_report').value);

			// Tampilkan modal menggunakan Bootstrap 5
			var myModal = new bootstrap.Modal(document.getElementById('addRowValidate'), {
				keyboard: false
			});
			myModal.show();
		}
	</script>

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			let currentStep = 0;
			const steps = document.querySelectorAll(".step");
			const nextButtons = document.querySelectorAll(".next-step");
			const prevButtons = document.querySelectorAll(".prev-step");

			function showStep(stepIndex) {
				steps.forEach((step, index) => {
					step.classList.remove("active-step");
					if (index === stepIndex) {
						step.classList.add("active-step");
					}
				});
			}

			nextButtons.forEach(button => {
				button.addEventListener("click", () => {
					if (currentStep < steps.length - 1) {
						currentStep++;
						showStep(currentStep);
					}
				});
			});

			prevButtons.forEach(button => {
				button.addEventListener("click", () => {
					if (currentStep > 0) {
						currentStep--;
						showStep(currentStep);
					}
				});
			});

			// Show the first step initially
			showStep(currentStep);
		});
	</script>

</body>

</html>