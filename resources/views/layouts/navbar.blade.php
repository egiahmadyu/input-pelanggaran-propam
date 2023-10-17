<div class="header">
    <div class="header-content clearfix">
        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
        <div class="header-left">
            <div class="input-group icons">
                <img src="/PRESISI-Garbha.png" class="img-fluid" alt="Responsive image" width="160">
            </div>
        </div>
        <div class="header-left">
            <div class="input-group icons">
                <h1>PROPAM INTEGRATED SYSTEM</h1>
            </div>
        </div>
        <div class="header-right">
            <ul class="clearfix">
                <li class="icons dropdown d-none d-md-flex">
                    <a href="javascript:void(0)" class="log-user" data-toggle="dropdown">
                        <span>{{ auth()->user()->name }}</span>
                    </a>
                </li>
                <li class="icons dropdown">
                    <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                        <span class="activity active"></span>
                        <img src="{{ asset('assets/images/logo-image.jpeg') }}" height="40" width="40"
                            alt="">
                    </div>
                    <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                {{-- <li>
                                    <a href="app-profile.html"><i class="icon-user"></i>
                                        <span>Profile</span></a>
                                </li>
                                <li>
                                    <a href="javascript:void()">
                                        <i class="icon-envelope-open"></i> <span>Inbox</span>
                                        <div class="badge gradient-3 badge-pill gradient-1">3</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="page-lock.html"><i class="icon-lock"></i> <span>Lock
                                            Screen</span></a>
                                        </li> --}}
                                <li><a href="/change-password"><i class="icon-key"></i>
                                        <span>Ganti Password</span></a>
                                </li>
                                <li><a href="/logout"><i class="icon-key"></i>
                                        <span>Logout</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
