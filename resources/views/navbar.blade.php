<!-- Logo Header -->
<div class="logo-header" data-background-color="white">
				
    <a href="/dashboard" class="logo">

    </a>
    <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
            <i class="bi bi-list"></i>
        </span>
    </button>
    <button class="topbar-toggler more"><i class="bi bi-three-dots-vertical"></i></button>
    <div class="nav-toggle">
        <button class="btn btn-toggle toggle-sidebar">
            <i class="bi bi-list"></i>
        </button>
    </div>
</div>
<!-- End Logo Header -->

<nav class="navbar navbar-header navbar-expand-lg" data-background-color="white">
				
    <div class="container-fluid">
        <div class="collapse" id="search-nav">
            <form class="navbar-left navbar-form nav-search mr-md-3">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="submit" class="btn btn-search pr-1">
                            <i class="fa fa-search search-icon"></i>
                        </button>
                    </div>
                    <input type="text" placeholder="Search ..." class="form-control">
                </div>
            </form>
        </div>
        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item toggle-nav-search hidden-caret">
                <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                    <i class="bi bi-search"></i>
                </a>
            </li>
            <li class="nav-item dropdown hidden-caret">
                <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bi bi-bell-fill"></i>
                    <span class="notification">4</span>
                </a>
                <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                    <li>
                        <div class="dropdown-title">You have 4 new notification</div>
                    </li>
                    <li>
                        <div class="notif-scroll scrollbar-outer">
                            <div class="notif-center">
                            @foreach($activities as $activity)
                                <a href="#">
                                    <div class="notif-content ml-3">
                                        <h5>{{ $activity->description }} oleh {{ $activity->access }} : {{ $activity->employee_name }}</h5>
                                        <h6>Aset : {{ $activity->properties['id_asset'] }} - {{ $activity->properties['asset_name'] }}</h6>
                                        <span class="time">{{ $activity->created_at->timezone('Asia/Jakarta')->format('d M Y H:i:s') }}</span>
                                    </div>
                                </a>
                            @endforeach
                            </div>
                        </div>
                    </li>
                    <li>
                        <a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                    <div class="avatar-sm">
                        <img src="{{asset('Image/user.png')}}" alt="..." class="avatar-img rounded-circle">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                        <li>
                            <div class="user-box">
                                <div class="avatar-lg"><img src="{{asset('Image/user.png')}}" alt="..." class="avatar-img rounded-circle"></div>
                                <div class="u-text">
                                    <h4>{{ Auth::user()->employee_name }}</h4>
                                    <p class="text-muted">{{ Auth::user()->email }}</p><a href="profile.html" class="btn btn-xs btn-secondary btn-sm text-white">View Profile</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">My Profile</a>
                            <a class="dropdown-item" href="#">My Balance</a>
                            <a class="dropdown-item" href="#">Inbox</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Account Setting</a>
                            <div class="dropdown-divider"></div>
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </div>
                </ul>
            </li>
        </ul>
    </div>
</nav>
