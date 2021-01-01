@extends('backend.layouts.app')
@section('style')
@endsection

@section('content')
    <div class="content">
        <div class="recharge-page">
            <ul class="navbar-tabs">
                <li data-tab-target="#tab-1">Nạp tiền</li>
                <li class="active" data-tab-target="#tab-2">Danh sách người dùng</li>
            </ul>

            <div class="content-tabs">

                <div id="tab-2" data-tab-content>
                    <div class="filter-box">
                        <div class="label">
                            <i class="fas fa-filter"></i>
                            <span>Bộ lọc</span>
                        </div>

                        <form method="POST">
                            <div class="input-group">
                                <label for="types">Loại giao dịch</label>
                                <select id="types" name="types">
                                    <option value="0">All</option>
                                    <option value="1">Tạo lệnh</option>
                                    <option value="2">Nạp số dư</option>
                                    <option value="3">Hoàn tiền</option>
                                </select>
                            </div>

                            <div class="input-group">
                                <label for="cash-flow">Luồng tiền</label>
                                <select id="cash-flow" name="cash-flow">
                                    <option value="0">All</option>
                                    <option value="1">Tiền vào</option>
                                    <option value="2">Tiền ra</option>
                                </select>
                            </div>

                            <div class="input-group">
                                <label for="created-time">Thời gian</label>
                                <select id="created-time" name="created-time">
                                    <option value="0">Mặc định</option>
                                    <option value="1">Mới nhất</option>
                                </select>
                            </div>


                        </form>
                    </div>

                    <div class="table">
                        <div class="row t-header">
                            <div class="cell">
                                <span>STT</span>
                            </div>
                            <div class="cell">
                                <span>Tên</span>
                            </div>
                            <div class="cell">
                                <span>Email</span>
                            </div>
                            <div class="cell">
                                <span>Số tiền</span>
                            </div>
                            <div class="cell">
                                <span>Role</span>
                            </div>
                            <div class="cell">
                                <span>Thời gian</span>
                            </div>
                            <div class="cell">
                                <span>Hành Động</span>
                            </div>
                        </div>

                        @foreach($users as $user)
                            <div class="row">
                                <div class="cell" data-title="STT">
                                    {{ $user->id }}
                                </div>
                                <div class="cell" data-title="Loại giao dịch">
                                    {{ $user->name }}
                                </div>
                                <div class="cell" data-title="Mã giao dịch">
                                    {{ $user->email }}
                                </div>
                                <div class="cell" data-title="Luồng tiền">
                                    {{ $user->amount }}
                                </div>
                                <div class="cell" data-title="Số tiền">
                                    {{ $user->role == 1 ? 'ADMIN' : 'USER' }}
                                </div>
                                <div class="cell" data-title="Thời gian tạo">
                                    {{ $user->created_at->format('Y-m-d H:i:s')  }}
                                </div>
                                <div class="cell" data-title="Hanh dong">
                                    <a href="{{ route(EDIT_USER, ['id' => $user->id]) }}" class="btn" title="Cần nạp  gấp ngay lập tức">Chỉnh Sữa</a>
                                    <a href="{{ route(DELETE_USER, ['user' => $user]) }}" class="btn" title="Cần nạp  gấp ngay lập tức">Xóa</a>
                                </div>
                            </div>

                        @endforeach
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
