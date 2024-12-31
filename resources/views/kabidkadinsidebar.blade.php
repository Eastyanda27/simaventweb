<!-- Sidebar -->
<div class="sidebar sidebar-style-2" style="background-color: white">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{asset('Image/user.png')}}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="ml-5">
                    <h5 class="text-dark">{{ Auth::user()->employee_name }}</h5>
                    <h6 class="text-dark">{{ Auth::user()->email }}</p>
                    <h6 class="text-dark">{{ Auth::user()->access }}</h6>
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span></span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item {{ Request::is('pegawai-dashboard') ? 'active' : '' }}">
                    <a href="/pegawai-dashboard" class="collapsed" aria-expanded="false">
                        <i class="bi bi-house-door-fill"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is(['aset*', 'kendaraan*', 'tanahbangunan*', 'elektronik*', 'perabotan', 'asetlain*']) ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#sidebarLayouts">
                        <i class="bi bi-box-seam-fill"></i>
                        <p>Data Aset</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ Request::is(['aset*', 'kendaraan*', 'tanahbangunan*', 'elektronik*', 'perabotan', 'asetlain*']) ? 'show' : '' }}" id="sidebarLayouts">
                        <ul class="nav nav-collapse">
                            <li class="nav-item {{ Request::is('aset') ? 'active' : '' }}">
                                <a href="/aset">
                                    <span class="sub-item">Semua Data</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('kendaraan*') ? 'active' : '' }}">
                                <a href="/kendaraan">
                                    <span class="sub-item">Kendaraan</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('elektronik*') ? 'active' : '' }}">
                                <a href="/elektronik">
                                    <span class="sub-item">Elektronik dan Mesin</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('perabotan*') ? 'active' : '' }}">
                                <a href="/perabotan">
                                    <span class="sub-item">Perabotan</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('asetlain*') ? 'active' : '' }}">
                                <a href="/aset">
                                    <span class="sub-item">Aset Lainnya</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ Request::is('inspeksi*') ? 'active' : '' }}">
                    <a href="/inspeksi" class="collapsed" aria-expanded="false">
                        <i class="bi bi-file-check-fill"></i>
                        <p>Laporan Kondisi Aset</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('laporan*') ? 'active' : '' }}">
                    <a href="/laporan" class="collapsed" aria-expanded="false">
                        <i class="bi bi-check2-circle"></i>
                        <p>Validasi Laporan Rekap</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->