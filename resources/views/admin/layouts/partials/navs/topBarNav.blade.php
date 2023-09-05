<header>
    <div class="topBar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-6">
                    <a href="" class="brand">
                        {{ config('settings.site_name', config('Laravel')) }}
                    </a>
                </div>
                <div class="col-6 d-sm-block d-md-block d-lg-none d-xl-none">
                    <button type="button" class="sidebarToggler"><i class="fas fa-bars"></i></button>
                </div>
                <div class="col-md-6 d-none d-sm-none d-md-none d-lg-block d-xl-block">
                    <ul class=" d-flex justify-content-end">
                        <li>
                            <button type="button" class="sidebarToggler"><i class="fas fa-times"></i></button>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-wrench"></i>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a href="" class="dropdown-item">My Account</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</header>
