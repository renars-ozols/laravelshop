 <nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand float-left" id="navbrand" href="{{ url('/') }}">
            <i class="fa fa-tshirt fa-sm"></i>
            {{ config('app.name', 'Larashop') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                @foreach ($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('category', [ 'slug' => $category->slug ]) }}">{{ __($category->name) }}</a>
                    </li>
                @endforeach
            </ul>
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                <li class="nav-item">
                    <a href="{{ Route('cart') }}" class="nav-link pr-2 text-warning">
                        @if (Cart::content()->count() > 0)
                            <span class="badge badge-danger">{{ Cart::content()->count() }}</span>
                        @endif
                        <i class="fa fa-shopping-cart fa-sm"></i>
                        Cart
                    </a>
                </li>
                @guest
                    <li class="{{ Request::is('login') ? 'nav-item active' : 'nav-item' }}">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fa fa-user fa-sm"></i>
                            {{ __('Login') }}
                        </a>
                    </li>
                    <li class="{{ Request::is('register') ? 'nav-item active' : 'nav-item' }}">
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">
                                <i class="fa fa-user-plus fa-sm"></i>
                                {{ __('Register') }}
                            </a>
                        @endif
                    </li>
                @else
                    <li class="nav-item dropdown pr-2">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="{{ route('dashboard') }}" class="dropdown-item">
                                <i class="fa fa-chart-line"></i>
                                {{ __('Dashboard') }}
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                <i class="fa fa-sign-out-alt"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>