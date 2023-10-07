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
                        <li class="dropdown notificationDropdownWrap">
                            <a type="button" class="dropdown-toggle notificationButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-bell"></i>
                                @if(auth()->user()->unreadNotifications)
                                    <span class="notifAmount">
                                        {{ auth()->user()->unreadNotifications->count() }}
                                    </span>
                                @endif
                            </a>
                            <ul class="dropdown-menu">
                                @foreach(auth()->user()->unreadNotifications as $notification)
                                    <li class="dropdown-item notificationItemInner">
                                        <h5>{{ $notification->data['title'] }}</h5>
                                        <p>
                                            {{ $notification->data['message'] }}
                                        </p>
                                        <button class="mark-as-read" data-notification-id="{{ $notification->id }}">Mark as Read</button>
                                    </li>
                                @endforeach
                                <li class="dropdown-item">
                                    <a href="" class="viewAllNotifsBtn">View all Notifications</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('admin.settings.index') }}">
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
