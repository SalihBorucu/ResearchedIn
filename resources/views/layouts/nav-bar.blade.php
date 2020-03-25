<div class="topbar">
    @if(Auth::user())

    <nav class="navbar-custom">

        <ul class="list-inline float-right mb-0">
            <li class="list-inline-item dropdown notification-list nav-user">

                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    {{-- <img src="assets/images/users/avatar-6.jpg" alt="user" class="rounded-circle"> --}}
                    <span class="d-none d-md-inline-block ml-1"> <i class="mdi mdi-chevron-down"></i>
                        {{ Auth::user()->name }}
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                    <a class="dropdown-item" href="#"><i class="dripicons-user text-muted"></i> Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                                                document.getElementById('logout-form').submit();"><i
                            class="dripicons-exit text-muted"></i>
                        Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="list-inline-item">
                <button type="button" class="button-menu-mobile open-left">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>
        </ul>
        @endif
    </nav>

</div>