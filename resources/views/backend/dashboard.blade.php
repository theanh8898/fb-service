@extends('backend.layouts.app')
@section('style')
@endsection

@section('content')
    <div class="content">
        <div class="dashboards-page">
            <div class="messenger-box">
                <h3 class="label"><i class="fas fa-bell"></i> Thông báo</h3>
                <div class="messenger-text">
                    <div class="post">
                        <div class="post__title">
                            <img src="./images/avatar.svg" alt="avatar" class="avatar">
                            <div class="wrapper">
                                <h4>Quản trị viên</h4>
                                <span class="date-time">11-11-2020</span>
                            </div>
                        </div>
                        <div class="post__content">
                            Khuyến mãi x2 khi nạp số dư vào tài khoản từ ngày 11/11/2020 đến ngày 12/12/2020
                        </div>
                    </div>
                </div>
            </div>
            <div class="top-ranking">
                <h3><i class="fas fa-crown"></i> Top 10 đại lí đạt doanh số cao nhất</h3>
                <div class="table">
                    <div class="t-head">
                        <div class="t-row">
                            <div class="t-col">STT</div>
                            <div class="t-col">Đại lí</div>
                            <div class="t-col">Doanh số</div>
                        </div>
                    </div>

                    <div class="t-body">
                        <div class="t-row no-1">
                            <div class="t-col">1</div>
                            <div class="t-col">Hoàng Hà</i></div>
                            <div class="t-col">999,999,999đ</div>
                        </div>

                        <div class="t-row">
                            <div class="t-col">2</div>
                            <div class="t-col">Phạm Thùy Linh</div>
                            <div class="t-col">600,000,000đ</div>
                        </div>

                        <div class="t-row">
                            <div class="t-col">3</div>
                            <div class="t-col">Đào Thế Anh</div>
                            <div class="t-col">333,300,000đ</div>
                        </div>

                        <div class="t-row">
                            <div class="t-col">4</div>
                            <div class="t-col">Phương Anh</div>
                            <div class="t-col">80,000,000đ</div>
                        </div>

                        <div class="t-row">
                            <div class="t-col">5</div>
                            <div class="t-col">Phương Anh</div>
                            <div class="t-col">80,000,000đ</div>
                        </div>

                        <div class="t-row">
                            <div class="t-col">6</div>
                            <div class="t-col">Phương Anh</div>
                            <div class="t-col">80,000,000đ</div>
                        </div>

                        <div class="t-row">
                            <div class="t-col">7</div>
                            <div class="t-col">Phương Anh</div>
                            <div class="t-col">80,000,000đ</div>
                        </div>

                        <div class="t-row">
                            <div class="t-col">8</div>
                            <div class="t-col">Phương Anh</div>
                            <div class="t-col">80,000,000đ</div>
                        </div>

                        <div class="t-row">
                            <div class="t-col">9</div>
                            <div class="t-col">Phương Anh</div>
                            <div class="t-col">80,000,000đ</div>
                        </div>

                        <div class="t-row">
                            <div class="t-col">10</div>
                            <div class="t-col">Phương Anh</div>
                            <div class="t-col">80,000,000đ</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // JSON.parse(undefined);
    </script>
@endsection
