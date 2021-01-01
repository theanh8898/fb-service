<header class="header">
    <!-- <div class="overlay"></div> -->

    <nav class="container container--px flex flex-jc-sb flex-ai-c">
        <a href="/" class="header__logo">
            <img src="{{ asset('images/logo_nobrand.png') }}" alt="Easybank">
        </a>

        <a id="btnHamburger" href="#" class="header__toggle hide-for-desktop">
            <span></span>
            <span></span>
            <span></span>
        </a>

        <div class="header__links hide-for-mobile">
            <a href="{{ route('dashboard') }}">Tài khoản</a>
            <a href="{{ route('dashboard') }}">Nạp số dư</a>
            <a href="{{ route('dashboard') }}">Quản lí hóa đơn</a>
            <a href="{{ route('dashboard') }}">Hỗ trợ</a>
        </div>

        <a class="button header__cta hide-for-mobile" href="{{ route('login') }}">
            Đăng nhập
        </a>
        <!-- <div class="header_balance hide-for-mobile">
          <span>Số dư : 0đ</span>
        </div> -->
    </nav>

    <div class="header__menu container has-fade">
        <a href="{{ route('dashboard') }}">Trang chủ</a>
        <a href="{{ route('dashboard') }}">Tài khoản</a>
        <a href="{{ route('dashboard') }}">Nạp số dư</a>
        <a href="{{ route('dashboard') }}">Quản lí hóa đơn</a>
        <a href="{{ route('dashboard') }}">Hỗ trợ</a>
    </div>
</header>
