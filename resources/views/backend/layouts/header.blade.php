<div class="header">
    <div class="wrapper">
        <div class="d-flex algin-item-center">
            <div class="avatar-img">
                <img src="{{ asset('images/avatar.jpg') }}" alt="avatar">
            </div>
            <h3>Xin chào <span>{{ Auth::user()->name }}</span></h3>
        </div>
        <div class="coin">Số dư: <span>{{ Auth::user()->amount }} $</span></div>
    </div>

    <!-- header for mobile -->
    <div class="header-mobile">
        <a id="btnHamburger" href="#" class="header__toggle hide-for-desktop">
            <span></span>
            <span></span>
            <span></span>
        </a>
        <div class="d-flex algin-item-center">
            <div class="avatar-img">
                <img src="{{ asset('images/avatar.jpg') }}" alt="avatar">
            </div>
            <div class="text">
                <h3>Hoang Ha</h3>
                <div>999,999$</div>
            </div>
        </div>
    </div>

    <!-- Menu for mobile -->
    <div class="left-sidebar-mobile">
        <ul class="menu">
            <li class="menu-item">
                <a  href="#"><i class="fas fa-home"></i>Trang chủ</a>
            </li>
            <li class="menu-item">
                <a  href="./nap-tien.html"><i class="fas fa-coins"></i></i>Nạp số dư</a>
            </li>
            <li class="menu-item dropdown-menu">
                <a href="#">
                    <i class="fab fa-facebook-f"></i>Dịch vụ<i class="dropdown-icon fas fa-chevron-down"></i>
                </a>
                <ul class="sub-menu">
                    <li class="sub-menu-item">
                        <a href="./mua-ngay.html"><i class="fas fa-user-plus"></i>Tăng theo dõi cá nhân</a>
                    </li>

                    <li class="sub-menu-item">
                        <a href="./mua-ngay.html"><i class="fas fa-thumbs-up"></i>Tăng like Fanpage</a>
                    </li>

                    <li class="sub-menu-item">
                        <a href="./mua-ngay.html"><i class="far fa-thumbs-up"></i>Tăng like bài viết</a>
                    </li>

                    <li class="sub-menu-item">
                        <a href="#"><i class="far fa-comment"></i></i>Tăng comment bài viêt</a>
                    </li>

                    <li class="sub-menu-item">
                        <a href="#"><i class="far fa-comments"></i></i>Tăng comment livestream</a>
                    </li>

                    <li class="sub-menu-item">
                        <a href="#"><i class="fas fa-users"></i></i>Share live vào nhiều nhóm</a>
                    </li>

                    <li class="sub-menu-item">
                        <a href="#"><i class="fas fa-user"></i></i>Share live vào nhiều trang cá nhân</a>
                    </li>
                </ul>
            </li>
            <li class="menu-item dropdown-menu">
                <a  href="./tai-khoan.html"><i class="fas fa-user"></i>Tài khoản</a>
            </li>
            <li class="menu-item">
                <a  href="./ho-tro.html"><i class="fas fa-headset"></i>Hỗ trợ</a>
            </li>
            <li class="menu-item">
                <a href="#" class="user-logout"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                ><i class="fas fa-sign-out-alt"></i>Đăng  xuất</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                {{--                        <a  href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i>Đăng  xuất</a>--}}
            </li>
        </ul>
    </div>

</div>
