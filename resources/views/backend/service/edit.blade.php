@extends('backend.layouts.app')
@section('style')
@endsection

@section('content')
    <div class="content">
        <!-- load content here -->
        <div class="services-page">
            <h3 class="title">Chỉnh sửa dịch vụ</h3>

            <form class="service-form" method="POST" action="{{ route('service.update', ['service' => $service]) }}">
                @csrf
                @method('PATCH')

                <div class="input-group">
                    <label for="name">Tên dịch vụ:</label>
                    <input type="text" name="name" value="{{ old('name') ? old('name') : $service->name }}" placeholder="Tên dịch vụ" required>

                </div>

                <div class="input-group">
                    <label for="code_type">Mã dịch vụ:</label>
                    <input type="text" name="code_type" value="{{ old('code_type') ? old('code_type') : $service->code_type }}" placeholder="VD: like, comment,..." required>
                </div>

                <div class="input-group">
                    <label for="price">Giá dịch vụ:</label>
                    <input type="number" value="{{ old('price') ? old('price') : $service->price }}" name="price" min="1" id="price" placeholder="Vd: 100000, 200000, 300000,..." required>
                </div>

                <div class="input-group">
                    <label for="number_of_price">Số lượng tương ứng với giá:</label>
                    <input type="number" value="{{ old('number_of_price') ? old('number_of_price') : $service->number_of_price }}" name="number_of_price" min="1" id="number_of_price" placeholder="Vd: 1, 100, 300,..." onchange="getAmount()" required>
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
    <script type="text/javascript">
        function getAmount() {
            let price = $('#price_service').val();
            let number_of_price = $('#number_price_service').val();
            let total = $('#total').val();

            $('#amount_label').html(price/number_of_price*total);
            $('#amount').val(price/number_of_price*total);
        }
    </script>
@endsection
