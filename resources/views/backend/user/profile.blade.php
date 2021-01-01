@extends('backend.layouts.app')
@section('style')

@endsection

@section('content')
    <div class="content">
        <!-- load content here -->
        <div class="user-page">
            <h3 class="title">Tài khoản</h3>

            <form class="user-form" action="{{ route(UPDATE_USER, ['user' => $user]) }}" method="POST">
                @csrf
                @method('PUT')

                <input type="text" id="price_service" name="type" value="profile" class="d-none">
                <div class="input-group">
                    <label for="name">Tài khoản</label>
                    <input type="text" name="name" value="{{ $user->name }}">
                </div>

                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="Email" value="{{ $user->email }}" required>
                </div>

                <div class="input-group">
                    <label for="phone">Số điện thoại:</label>
                    <input type="text" name="phone" placeholder="Số điện thoại:" value="{{ $user->phone }}" required>
                </div>

                <div class="input-group">
                    <label for="password">Mật khẩu mới:</label>
                    <input type="password" name="new_password">
                </div>

                <div class="input-group">
                    <label for="confirm_password">Nhập lại mật khẩu mới:</label>
                    <input type="password" name="confirm_password">
                </div>

                @if(count($errors->all()) > 0)
                    @foreach ($errors->all() as $error)
                        <p class="text-danger font-size-12" style="color: red">
                            {{ $error }}
                        </p>
                    @endforeach
                @endif

                <button type="submit">Cập nhật</button>
                <div style="clear: both;"></div>
            </form>


            <!-- end load content -->
        </div>
    </div>
@endsection

@section('script')
    <script>
        // JSON.parse(undefined);
    </script>
@endsection
