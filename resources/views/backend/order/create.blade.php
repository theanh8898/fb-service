@extends('backend.layouts.app')
@section('style')
@endsection

@section('content')
    <div class="content">
        <!-- load content here -->
        <div class="services-page">
            <h3 class="title">{{ $service->name }}</h3>

            <form class="service-form" method="POST" action="{{ route('service.order.store', ['service' => $service]) }}">
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
