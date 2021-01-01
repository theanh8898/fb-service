@extends('backend.layouts.app')
@section('style')
@endsection

@section('content')
    <div class="content">
        <!-- load content here -->
        <div class="services-page">
            <h3 class="title">{{ $service->name }}</h3>

            <div class="services-page__wrapper">
                <div class="service-form">
                    <form method="POST" action="{{ route('service.order.store', ['service' => $service]) }}">
                        @csrf
                        <input type="text" id="price_service" name="price" value="{{ $service->price }}" class="d-none">
                        <input type="text" id="id_service" name="id_service" value="{{ $service->id }}" class="d-none">
                        <input type="text" id="number_price_service" name="number_of_price" value="{{ $service->number_of_price }}" class="d-none">
                        <input type="text" id="amount" name="amount" value="0" class="d-none">

                        <div class="input-group">
                            <label for="link">Nhập Link/Id cần tăng:</label>
                            <input type="text" name="link" value="{{ old('link') }}" placeholder="Vd: https://facebook.com/abc123" required>
                        </div>

                        <div class="input-group">
                            <label for="number_up">Số lượng cần tăng:</label>
                            <input type="number" name="number_up" value="{{ old('number_up') }}" id="number_up" placeholder="Vd: 1, 100, 300,..." onchange="getAmount()" required>
                        </div>

                        <div class="input-group">
                            <label for="content">Nhập Content cần tăng:</label>
                            <textarea name="content" rows="10" placeholder="Mỗi một dòng tương đương một comment">{{ old('content') }}</textarea>
                        </div>

                        <div class="input-group">
                            <label for="note">Ghi chú:</label>
                            <textarea name="note" rows="6" placeholder="Nhập nội dung ghi chú về tiến trình của bạn" >{{ old('note') }}</textarea>
                        </div>


                        <div class="input-group price">
                            <label>Tổng tiền (VND):</label>
                            <strong id="amount_label">{{ old('amount') ? old('amount') : 0 }}</strong>
                        </div>

                        @if(count($errors->all()) > 0)
                            @foreach ($errors->all() as $error)
                                <p class="text-danger font-size-12" style="color: red">
                                    {{ $error }}
                                </p>
                            @endforeach
                        @endif

                        <button type="submit">Tạo lệnh</button>
                        <div style="clear: both;"></div>
                    </form>
                </div>

                <div class="services-page__right-content">
                    <h3 class="title">Chú ý:</h3>
                    <ul class="notes">
                        <li class="note">
                        <span>- 100% tài nguyên nick fb thuộc <span class="link">trustfb.vn</span> Nick được nuôi và phát triển như người dùng thật, đảm bảo tối đa hiệu quả cho khách hàng.
                          - Thời gian hoàn thành lệnh tăng theo dõi, tăng like thường trong 1-3 ngày,khách cần gấp vui lòng nhắn hỗ trợ.</span>
                        </li>
                        <li class="note">
                        <span>
                          - Vui lòng lấy đúng ID cần tăng,id để chế độ công khai,nếu sai quá 3 lần hệ thống không hoàn tiền.
                        </span>
                        </li>
                        <li class="note">
                        <span>
                          - Để đảm bảo đúng rule Fb,khách nên tăng tối đa 1000-2000 theo dõi/id/ngày, 100-1000 Like Fanpage /id/ngày.số lượng tối đa tùy theo độ trust của nick khách.Không nên tăng quá nhiều đối với Fanpage,tránh trường hợp bị hủy đăng.
                        </span>
                        </li>
                        <li class="note">
                        <span>
                          - Chính sách bảo hành: <span class="link">trustfb.vn</span> bảo hành 15 ngày tụt theo dõi cho khách.Khi tụt quá 20% vui lòng nhắn id bên <span class="link">trustfb.vn</span> check và bảo hành.
                        </span>
                        </li>
                        <li class="note">
                        <span>
                        - Chính sách bảo hành: <span class="link">trustfb.vn</span> bảo hành 15 ngày tụt theo dõi cho khách.Khi tụt quá 20% vui lòng nhắn id bên <span class="link">trustfb.vn</span> check và bảo hành.
                        </span>
                        </li>
                        <li class="note">
                        <span>
                          - Lưu ý : <span class="link">trustfb.vn</span> không chịu trách nhiệm các trường hợp: sau khi page tăng like bị hủy đăng,...
                        </span>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end load content -->
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        function getAmount() {
            let price = $('#price_service').val();
            let number_of_price = $('#number_price_service').val();
            let total = $('#number_up').val();

            $('#amount_label').html(price/number_of_price*total);
            $('#amount').val(price/number_of_price*total);
        }
    </script>
@endsection
