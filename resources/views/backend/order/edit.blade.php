@extends('backend.layouts.app')
@section('style')
@endsection

@section('content')
    <div class="content">
        <!-- load content here -->
        <div class="services-page">
            <h3 class="title">{{ $order->service->name }}</h3>

            <form class="service-form" method="POST" action="{{ route('service.order.update', ['service' => $order->service, 'order' => $order]) }}">
                @csrf
                @method('PATCH')

                <div class="input-group">
                    <label for="url">Nhập Link/Id cần tăng:</label>
                    <input type="text" name="url" value="{{ old('url') ? old('url') : $order->link }}" placeholder="Vd: https://facebook.com/abc123" required disabled>

                </div>

                <div class="input-group">
                    <label for="total">Số lượng cần tăng:</label>
                    <input type="number" value="{{ old('total') ? old('total') : $order->number_up }}" name="total" min="0" id="total" placeholder="Vd: 1, 100, 300,..." onchange="getAmount()" required disabled>
                </div>

                <div class="input-group">
                    <label for="content">Nhập Content cần tăng:</label>
                    <textarea name="content" rows="10" placeholder="Mỗi một dòng tương đương một comment" disabled>
                        {!! old('content') ? old('content') : $order->content !!}
                    </textarea>
                </div>

                <div class="input-group">
                    <label for="note">Ghi chú:</label>
                    <textarea name="note" rows="6" placeholder="Nhập nội dung ghi chú về tiến trình của bạn" disabled>
                        {!! old('note') ? old('note') : $order->note !!}
                    </textarea>
                </div>

                <div class="form-group row">
                    <label for="status" class="col-md-2 col-form-label">@lang('Status')
                        <span class="text-danger">*</span>
                    </label>

                    <div class="col-md-10">
                        <select class="custom-select" style="width:200px;" name="status">
                            <option value="pending" @if($order->status == 'pending') selected @endif>Pending</option>
                            <option value="doing" @if($order->status == 'doing') selected @endif>Doing</option>
                            <option value="done" @if($order->status == 'done') selected @endif>Done</option>
                        </select>
                    </div>
                </div><!--form-group-->


                <div class="input-group price">
                    <label>Tổng tiền (VND):</label>
                    <strong id="amount_label">{{ $order->amount }}</strong>
                </div>
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
