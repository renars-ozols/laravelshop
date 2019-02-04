<nav id="sidebar">
    <ul class="list-unstyled components">
        <li class="{{ Request::segment(2) === 'dashboard' ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}"><i class="fa fa-chart-line mr-3"></i>Dashboard</a>
        </li>
        @if (Auth::user()->admin)
            <li class="{{ Request::segment(2) === 'products' ? 'active' : '' }}">
            <a href="{{ route('products.index') }}"><i class="fa fa-th-list mr-3"></i>Products</a>
            </li>
            <li class="{{ Request::segment(2) === 'orders' ? 'active' : '' }}">
                <a href="{{ route('orders.index') }}"><i class="fa fa-clipboard-list mr-3"></i>Orders</a>
            </li>
        @endif
        <li class="{{ Request::segment(2) === 'settings' ? 'active' : '' }}">
            <a href="{{ Auth::user()->admin == '1' ? route('admin.settings') : route('user.settings') }}"><i class="fa fa-cog mr-3"></i>Settings</a>
        </li>
        <li>
            <a href="/"><i class="fa fa-arrow-left mr-3"></i>Shop</a>
        </li>
    </ul>
</nav>