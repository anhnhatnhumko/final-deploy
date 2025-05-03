<header class="header">
    <div class="container">
        <div class="logo">MyShop</div>
        <nav class="nav">
            <ul>
                <li><a href="{{ route('dashboard') }}">Trang chủ</a></li>
                <li><a href="{{ route('products.index') }}">Sản phẩm</a></li>
                <li><a href="{{ route('products.create') }}">Thêm sản phẩm</a></li>
                <li>
                    <a href="{{ route('logout') }}" class="btn-login"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Đăng xuất
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</header>
