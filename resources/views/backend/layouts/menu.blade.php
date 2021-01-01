<div class="left-sidebar">
    <div class="logo-img">
        <img src="{{ asset('images/logo-ii.png') }}" alt="logo">
    </div>
    <ul class="menu">
        <li class="menu-item">
            <a  href="#"><i class="fas fa-home"></i>Trang chủ</a>
        </li>
        <li class="menu-item">
            <a href="{{ route('order.index') }}"><i class="fas fa-coins"></i>Nạp số dư</a>
        </li>
        @if(\Illuminate\Support\Facades\Auth::user()->role == 1)
        <li class="menu-item">
            <a href="{{ route(LIST_USER) }}"><i class="fas fa-coins"></i>Quản lý người dùng</a>
        </li>
        @endif
        <li class="menu-item dropdown-menu">
            <a href="#">
                <i class="fab fa-facebook-f"></i>Dịch vụ<i class="dropdown-icon fas fa-chevron-down"></i>
            </a>
            @php
                $services = \App\Models\Service::all();
            @endphp
            <ul class="sub-menu">
                @foreach($services as $service)
                    <li class="sub-menu-item">
                        <a href="{{ route('service.order.create', ['service' => $service]) }}"><i class="fas fa-user-plus"></i>{{ $service->name }}</a>
                    </li>
                @endforeach
            </ul>
        </li>
        <li class="menu-item dropdown-menu">
            <a href="{{ route('service.index') }}">
                <i class="fab fa-facebook-f"></i>Quan ly Dịch vụ
            </a>
        </li>
        <li class="menu-item dropdown-menu">
            <a href="{{ route(PROFILE_USER) }}"><i class="fas fa-user"></i>Tài khoản</a>
        </li>
        <li class="menu-item">
            <a href="{{ route('config.support') }}"><i class="fas fa-headset"></i>Hỗ trợ</a>
        </li>
        <li class="menu-item">
            <a href="#" class="user-logout"
               onclick="event.preventDefault();document.getElementById('logout-form').submit();"
            ><i class="fas fa-sign-out-alt"></i>Đăng  xuất</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</div>
