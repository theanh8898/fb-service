@extends('frontend.layouts.app')
@section('style')
@endsection

@section('content')

    <section class="hero">
        <div class="">
            <img src="{{ asset('images/banner.jpg') }}" alt="banner">
        </div>
    </section>

    <section class="section our-services">
        <div class="section__title">
            <h2>Dịch vụ Facebook</h2>
        </div>
        <div class="section__content">
            <div class="services">
                <div class="service">
                    <div class="service__icon">
                        <img src="{{ asset('images/services/add-user.svg') }}" alt="icon">
                    </div>
                    <h3 class="service__label">Tăng theo dõi cá nhân</h3>
                    <p class="service__price">399.000đ</p>
                    <div class="service__btn">
                        <a href="{{ route('login') }}" class="btn-link">Mua ngay</a>
                    </div>
                </div>

                <div class="service">
                    <div class="service__icon">
                        <img src="{{ asset('images/services/layout.svg') }}" alt="icon">
                    </div>
                    <h3 class="service__label">Tăng like Fanpage</h3>
                    <p class="service__price">399.000đ</p>
                    <div class="service__btn">
                        <a href="{{ route('login') }}" class="btn-link">Mua ngay</a>
                    </div>
                </div>

                <div class="service">
                    <div class="service__icon">
                        <img src="{{ asset('images/services/like.svg') }}" alt="icon">
                    </div>
                    <h3 class="service__label">Tăng like bài viết</h3>
                    <p class="service__price">399.000đ</p>
                    <div class="service__btn">
                        <a href="{{ route('login') }}" class="btn-link">Mua ngay</a>
                    </div>
                </div>


                <div class="service">
                    <div class="service__icon">
                        <img src="{{ asset('images/services/chat.svg') }}" alt="icon">
                    </div>
                    <h3 class="service__label">Tăng Commnet Seeding Bài viết</h3>
                    <p class="service__price">399.000đ</p>
                    <div class="service__btn">
                        <a href="{{ route('login') }}" class="btn-link">Mua ngay</a>
                    </div>
                </div>

            </div>

            <div class="services">
                <div class="service">
                    <div class="service__icon">
                        <img src="{{ asset('images/services/eye.svg') }}" alt="icon">
                    </div>
                    <h3 class="service__label">Tăng Comment Seeding Livestream</h3>
                    <p class="service__price">399.000đ</p>
                    <div class="service__btn">
                        <a href="{{ route('login') }}" class="btn-link">Mua ngay</a>
                    </div>
                </div>

                <div class="service">
                    <div class="service__icon">
                        <img src="{{ asset('images/services/followers.svg') }}" alt="icon">
                    </div>
                    <h3 class="service__label">Share Live vào nhiều nhóm</h3>
                    <p class="service__price">399.000đ</p>
                    <div class="service__btn">
                        <a href="{{ route('login') }}" class="btn-link">Mua ngay</a>
                    </div>
                </div>


                <div class="service">
                    <div class="service__icon">
                        <img src="{{ asset('images/services/user-check.svg') }}" alt="icon">
                    </div>
                    <h3 class="service__label">Share Live lên nhiều trang cá nhân</h3>
                    <p class="service__price">399.000đ</p>
                    <div class="service__btn">
                        <a href="{{ route('login') }}" class="btn-link">Mua ngay</a>
                    </div>
                </div>

                <div class="service">
                    <div class="service__icon">
                        <img src="{{ asset('images/services/menu.svg') }}" alt="icon">
                    </div>
                    <h3 class="service__label">Dịch vụ khác</h3>
                    <p class="service__price">Coming soon</p>
                    <div class="service__btn">
                        <a href="{{ route('login') }}" class="btn-link">Mua ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section why-choose-us">
        <div class="section__content">
            <div class="img-inner">
                <img src="{{ asset('images/home7_img_05.png') }}" alt="">
            </div>
            <div class="text">
                <h3 class="title">Tại sao sử dụng dịch vụ của chúng tôi?</h3>
                <ul>
                    <li>
                        <h4 class="label">Tốc độ</h4>
                        <p>Các gói dịch vụ được hoàn thành nhanh chóng.</p>
                    </li>

                    <li>
                        <h4 class="label">An toàn</h4>
                        <p>Không bị khóa, blog bất cứ tính năng nào của tài khoản khách hàng.</p>
                    </li>

                    <li>
                        <h4 class="label">Chi phí</h4>
                        <p>Chi phí đa dạng phù hợp theo nhu cầu của người dùng với mức giá tốt nhất.</p>
                    </li>

                    <li>
                        <h4 class="label">Bảo mật</h4>
                        <p>Tất cả các dịch vụ đều được thực hiện bởi người thật, đảm bảo an toàn cho khách hàng</p>
                    </li>

                    <li>
                        <h4 class="label">Dễ sử dụng</h4>
                        <p>Với giao diện đơn giản, thân thiện giúp người dùng dễ làm quen khi sử dụng</p>
                    </li>

                    <li>
                        <h4 class="label">Hỗ trợ</h4>
                        <p>Hỗ trợ dịch vụ 24/7 đảm bảo các yêu cầu của khách hàng được giải quyết nhanh chóng</p>
                    </li>
                </ul>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script>
        // JSON.parse(undefined);
    </script>
@endsection
