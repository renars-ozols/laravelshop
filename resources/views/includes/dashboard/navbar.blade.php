 <nav class="navbar navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" id="navbrand" href="{{ url('/') }}">
            <i class="fa fa-tshirt fa-sm"></i>
            {{ config('app.name', 'Larashop') }}
        </a>
        <a href="#" id="sidebarCollapse" class="text-white mr-auto ml-3">
            <i class="fas fa-bars"></i>
        </a>

        <!-- Right Side Of Navbar -->
        <div>
            <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out-alt"></i>
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li> 
            </ul>
        </div>
    </div>
</nav>