<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Simavent</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('Image/logosmall.png') }}" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.43.0/apexcharts.min.css" integrity="sha512-nnNXPeQKvNOEUd+TrFbofWwHT0ezcZiFU5E/Lv2+JlZCQwQ/ACM33FxPoQ6ZEFNnERrTho8lF0MCEH9DBZ/wWw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

	<!-- Fonts and icons -->
	<script src=" {{asset('assets/css/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: [{{asset('assets/css/fonts.min.css')}}]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link href="{{asset('assets/css/atlantis.min.css')}}" rel="stylesheet" />

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">
      <img src="{{ asset('Image/logosmall.png') }}" alt="Logo BNN" style="width: 50px; height: 50px; margin-right: 20px;">
      <h1 class="logo me-auto"><a href="index.html">Simavent</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#pelayanan">Tentang Fitur</a></li>
          <li><a class="nav-link scrollto" href="#skills">Tentang Simavent</a></li>
          <li><a class="nav-link scrollto" href="#faq">FAQ</a></li>
          <li><a class="nav-link scrollto" href="#kontak">Kontak</a></li>
          <li><a class="getstarted" href="/login">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>SIMAVENT - SISTEM INFORMASI MANAJEMEN INVENTARIS DAERAH</h1>
          <h2>Dinas Komunikasi dan Informatika <br> Pemerintah Daerah Kabupaten Kerinci</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#profil" class="btn-get-started scrollto">Tentang Kami</a>
            <a href="" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Video Profil</span></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{ asset('Image/logosmall.png') }}" class="img-fluid animated" alt="" style="width: 100%; height: auto;">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="profil" class="profil">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Tentang Kami</h2>
        </div>
        <div class="row content">
          <div class="col-lg-6">
            <div class="section-title">
              <h2>Visi</h2>
            </div>
            <p>
              “Terwujudnya Kabupaten Kerinci yang Cerdas, Inovatif, dan Informatif melalui Pemanfaatan Teknologi Informasi dan Komunikasi untuk Mendukung Pelayanan Publik yang Transparan dan Akuntabel.”
            </p>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <div class="section-title">
              <h2>Misi</h2>
            </div>
            <p>
              1. Mengembangkan dan memperkuat infrastruktur digital untuk mendukung transformasi pelayanan publik berbasis teknologi di seluruh wilayah Kabupaten Kerinci.
            </p>
            <p>
              2. Meningkatkan efisiensi, efektivitas, dan akurasi pelayanan pemerintahan melalui penerapan sistem informasi yang terpadu.
            </p>
            <p>
              3. Mengedukasi masyarakat dan aparatur pemerintah agar melek teknologi, sehingga mampu memanfaatkan TIK secara produktif dan bertanggung jawab.
            </p>
            <p>
              4. Menjamin keterbukaan informasi publik sesuai dengan prinsip transparansi, sehingga masyarakat dapat dengan mudah mengakses informasi yang relevan.
            </p>
            <p>
              5. Mendorong inovasi berbasis teknologi dan menjalin kemitraan strategis dengan berbagai pihak untuk mempercepat transformasi digital di Kabupaten Kerinci.
            </p>
            <p>
              6. Meningkatkan sistem keamanan data untuk melindungi informasi pemerintah dan masyarakat dari ancaman siber.
            </p>
          </div>
        </div>
      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Pelayanan Section ======= -->
    <section id="pelayanan" class="pelayanan section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Tentang Fitur</h2>
          <p>Sistem Informasi Manajemen Inventaris Diskominfo Kabupaten Kerinci beberapa fitur layanan antara lain:</p>
        </div>

        <div class="row">
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><a href="">Pencatatan Inventaris</a></h4>
              <p>Menyediakan informasi mengenai barang inventaris dengan lengkap dan jelas. </p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-graph-up"></i></div>
              <h4><a href="">Dashboard Visualisasi Data</a></h4>
              <p>Menampilkan dashboard yang memvisualisasikan data inventaris secara intuitif.</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-qr-code"></i></div>
              <h4><a href="">Integrasi QR-Code</a></h4>
              <p>Mendukung penggunaan QR Code untuk identifikasi dan pelacakan barang secara akurat.</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-files"></i></div>
              <h4><a href="">Pelaporan</a></h4>
              <p>Memberikan pelaporan yang rinci mengenai barang inventaris dan dapat diunduh menjadi file Pdf ataupun Excel</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div style="display: flex; align-items: center; padding: 0 15px;">
            <div style="display: flex; flex-wrap: wrap; width: 100%; max-width: 1200px; margin: auto;">
              
              <!-- Bagian Kiri: Informasi -->
              <div style="flex: 1; max-width: 50%; padding: 15px;" data-aos="fade-right" data-aos-delay="100">
                <h3 style="font-weight: bold; color: #333; margin-bottom: 15px;">Apa itu SIMAVENT?</h3>
                <p style="font-style: italic; color: #555; margin-bottom: 20px;">
                  Sebuah website yang dibuat khusus untuk mengelola inventaris dan aset dari data pencatatan dan pencacatan informasi untuk monitoring menuju lembaga yang berintegritas.
                </p>
                <button style="background-color: #2c3e50; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">
                  Selengkapnya
                </button>
              </div>
              
              <!-- Bagian Kanan: Formulir -->
              <div style="max-width: 600px; margin: auto; font-family: Arial, sans-serif;">
                <h4 style="font-size: 24px; font-weight: bold; color: #2c3e50; margin-bottom: 20px;">Kenapa Harus Menggunakan Simavent</h4>
                
                <!-- Pertanyaan 1 -->
                <div style="border-bottom: 1px solid #e6e6e6; padding: 15px 0;">
                  <button onclick="toggleAccordion(1)" style="width: 100%; background-color: transparent; border: none; display: flex; align-items: center; justify-content: space-between; text-align: left; font-size: 18px; font-weight: bold; color: #007bff; cursor: pointer; padding: 0;">
                    <span style="flex-shrink: 0; width: 30px; font-size: 16px; font-weight: bold; color: #2c3e50; margin-right: 10px;">01</span>
                    <span style="flex-grow: 1;">Efisiensi Proses</span>
                  </button>
                  <div id="accordion-answer-1" style="display: none; margin-top: 10px; padding-left: 40px; font-size: 14px; color: #555; line-height: 1.6;">
                    Sistem mempercepat proses pencatatan, pencarian, dan pembaruan data dibandingkan metode manual.
                  </div>
                </div>
              
                <!-- Pertanyaan 2 -->
                <div style="border-bottom: 1px solid #e6e6e6; padding: 15px 0;">
                  <button onclick="toggleAccordion(2)" style="width: 100%; background-color: transparent; border: none; display: flex; align-items: center; justify-content: space-between; text-align: left; font-size: 18px; font-weight: bold; color: #007bff; cursor: pointer; padding: 0;">
                    <span style="flex-shrink: 0; width: 30px; font-size: 16px; font-weight: bold; color: #2c3e50; margin-right: 10px;">02</span>
                    <span style="flex-grow: 1;">Kemudahan Akses</span>
                  </button>
                  <div id="accordion-answer-2" style="display: none; margin-top: 10px; padding-left: 40px; font-size: 14px; color: #555; line-height: 1.6;">
                    Berbasis web, dapat diakses kapan saja, di mana saja, dengan pengaturan hak akses yang aman.
                  </div>
                </div>
              
                <!-- Pertanyaan 3 -->
                <div style="border-bottom: 1px solid #e6e6e6; padding: 15px 0;">
                  <button onclick="toggleAccordion(3)" style="width: 100%; background-color: transparent; border: none; display: flex; align-items: center; justify-content: space-between; text-align: left; font-size: 18px; font-weight: bold; color: #007bff; cursor: pointer; padding: 0;">
                    <span style="flex-shrink: 0; width: 30px; font-size: 16px; font-weight: bold; color: #2c3e50; margin-right: 10px;">03</span>
                    <span style="flex-grow: 1;">Penghematan Biaya</span>
                  </button>
                  <div id="accordion-answer-3" style="display: none; margin-top: 10px; padding-left: 40px; font-size: 14px; color: #555; line-height: 1.6;">
                    Mengurangi penggunaan kertas dan duplikasi pekerjaan, sehingga operasional lebih hemat.
                  </div>
                </div>
              </div>
              
            </div>
          </div>          
        </div>

      </div>
    </section><!-- End Skills Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Pertanyaan yang Sering Diajukan</h2>
          <p>Berikut beberapa pertanyaan yang sering ditanyakan mengenai sistem:</p>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Apa itu sistem manajemen barang inventaris berbasis web? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                  Sistem ini adalah aplikasi berbasis web yang digunakan untuk mengelola dan melacak barang inventaris, seperti kendaraan, elektronik, perabotan, dan lain-lain. Fitur-fitur utama meliputi pencatatan barang, pengelompokan kategori, log aktivitas, serta pembuatan laporan kondisi dan riwayat barang.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-2">Bagaimana cara mengakses sistem ini?? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse show" data-bs-parent=".faq-list">
                <p>
                  Sistem ini dapat diakses melalui browser web, yang memungkinkan pengguna untuk mengelola inventaris dari mana saja. Akses dibatasi sesuai dengan hak akses masing-masing pengguna (Admin, Staf Pegawai, Kepala Bidang).
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-3">Apa manfaat utama dari sistem ini? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse show" data-bs-parent=".faq-list">
                <p>
                  Sistem ini memberikan efisiensi dalam pengelolaan inventaris, meningkatkan keakuratan data, mempermudah pembuatan laporan, menghemat biaya operasional, dan memastikan keamanan data melalui pengaturan hak akses dan pencadangan otomatis.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-4">Apakah saya bisa melacak riwayat barang melalui sistem ini? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse show" data-bs-parent=".faq-list">
                <p>
                  Ya, sistem ini memungkinkan pengguna untuk melacak riwayat barang, termasuk pembelian, pemindahan, perbaikan, atau perubahan status lainnya, yang dapat membantu dalam pengelolaan dan pengawasan aset.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-4">Apakah sistem ini mendukung penggunaan QR Code untuk identifikasi barang? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse show" data-bs-parent=".faq-list">
                <p>
                  Ya, sistem ini dilengkapi dengan fitur QR Code yang memungkinkan pengguna untuk memindai kode QR pada barang inventaris untuk melihat detail informasi terkait, seperti kondisi, lokasi, dan riwayat aset, dengan mudah dan cepat.
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    <section id="kontak" class="kontak">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Kontak</h2>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Lokasi:</h4>
                <p>Komplek Perkantoran Bukit Tengah, Siulak, Kerinci - Jambi</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>kominfo@kerincikab.go.id</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>(0748) 000000</p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31900.335637415963!2d101.3065446108398!3d-1.9355425999999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2d07d75ac61f71%3A0x6b3df2155793db0!2sDinas%20Komunikasi%20dan%20Informatika%20Kabupaten%20Kerinci!5e0!3m2!1sid!2sid!4v1735114105423!5m2!1sid!2sid" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Nama</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Subjek</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group">
                <label for="name">Pesan</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="my-3">
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container footer-bottom clearfix">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Dinas Komunikasi dan Informatika Kabupaten Kerinci</h3>
            <p>
              Komplek Perkantoran Bukit Tengah, Siulak <br>
              Kerinci, Jambi<br>
              Indonesia <br><br>
              <strong>Phone:</strong> (0748) 000000<br>
              <strong>Email:</strong> kominfo@kerincikab.go.id<br>
            </p>
          </div>
      
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Layanan Masyarakat</h4>
            <ul>
              <li><a href="https://dinkes.kerincikab.go.id/" target="_blank">Kesehatan</a></li>
              <li><a href="https://disdik.kerincikab.go.id/" target="_blank">Pendidikan</a></li>
              <li><a href="https://dpm-ptsp.kerincikab.go.id/" target="_blank">Perizinan</a></li>
              <li><a href="https://disdukcapil.kerincikab.go.id/" target="_blank">Kependudukan</a></li>
              <li><a href="https://dinsos.kerincikab.go.id/" target="_blank">Bantuan Sosial</a></li>
              <li><a href="https://www.lapor.go.id/instansi/pemerintah-kabupaten-kerinci" target="_blank">Pengaduan</a></li>
              <li><a href="https://skm.kerincikab.go.id/" target="_blank">Survey Kepuasan Masyarakat</a></li>
              <li><a href="https://ppid.kerincikab.go.id/" target="_blank">Permintaan Informasi Publik</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Hot Spot</h4>
            <ul>
              <li><a href="https://www.google.com/maps/search/kuliner+kerinci/@-1.9862374,101.2762967,11z?entry=ttu&g_ep=EgoyMDI0MTIxMS4wIKXMDSoASAFQAw%3D%3D" target="_blank">Kuliner</a></li>
              <li><a href="https://www.google.com/maps/search/wisata+kerinci/@-1.9861973,101.2762947,11z/data=!3m1!4b1?entry=ttu&g_ep=EgoyMDI0MTIxMS4wIKXMDSoASAFQAw%3D%3D" target="_blank">Desa Wisata</a></li>
              <li><a href="https://www.google.com/maps/search/penginapan+kerinci/@-1.9862092,101.2762953,11z/data=!3m1!4b1?entry=ttu&g_ep=EgoyMDI0MTIxMS4wIKXMDSoASAFQAw%3D%3D" target="_blank">Hotel & Penginapan</a></li>
              <li><a href="https://www.google.com/maps/search/agen+travel+kerinci/@-1.9861854,101.2762941,11z/data=!3m1!4b1?entry=ttu&g_ep=EgoyMDI0MTIxMS4wIKXMDSoASAFQAw%3D%3D" target="_blank">Travel Agen</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Media Sosial Kami</h4>
            <p>Kunjungi Media Sosial Kami untuk Mendapatkan Informasi Menarik Lainnya</p>
            <div class="social-links mt-3">
              <a href="https://www.instagram.com/kominfo.kerinci/" class="instagram" target="_blank"><i class="bx bxl-instagram"></i></a>
              <a href="https://www.youtube.com/@pemkab.kerinci03" class="youtube" target="_blank"><i class="bx bxl-youtube"></i></a>
            </div>
          </div>

        </div>
      </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.43.0/apexcharts.min.js" integrity="sha512-vv0F8Er+ByFK3l86WDjP5Zc0h8uxNWPzF+l4wGK0/BlHWxDiFHbYr/91dn8G0OO8tTnN40L4s2Whom+X2NxPog==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

  <script src="{{ asset('assets/js/jquery.3.2.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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

  <script>
    function toggleAccordion(id) {
      const answer = document.getElementById(`accordion-answer-${id}`);
      const isHidden = answer.style.display === "none" || answer.style.display === "";
      // Tutup semua jawaban
      document.querySelectorAll('[id^="accordion-answer"]').forEach((el) => {
        el.style.display = "none";
      });
      // Tampilkan jawaban yang dipilih jika sebelumnya tersembunyi
      if (isHidden) {
        answer.style.display = "block";
      }
    }
  </script>

</body>

</html>