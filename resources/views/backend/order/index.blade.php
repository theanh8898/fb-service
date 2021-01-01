@extends('backend.layouts.app')
@section('style')
@endsection

@section('content')
    <div class="content">
        <div class="recharge-page">
            <ul class="navbar-tabs">
                <li class="active" data-tab-target="#tab-1">Nạp tiền</li>
                <li data-tab-target="#tab-2">Lịch sử giao dịch</li>
            </ul>

            <div class="content-tabs">
                <div id="tab-1"  class="active" data-tab-content>
                    <strong>Chuyển khoản ngân hàng</strong>
                    <ul class="payments">
                        <li class="payment">
                            <div class="label">
                                <img class="banner-techcombank" src="{{ asset('images/techcombank.png') }}" alt="Techcombank">
                                <span>Techcombank:</span>
                            </div>
                            <div class="info">19032574065011 BUI KIM PHUONG</div>
                        </li>
                        <li class="payment">
                            <div class="label">
                                <img class="banner-vietcombank" src="{{ asset('images/Vietcombank_Logo.png') }}" alt="Vietcombank">
                                <span>Vietcombank:</span>
                            </div>
                            <div class="info">1031000011505 BUI KIM PHUONG</div>
                        </li>
                        <li class="payment">
                            <div class="label">
                                <img class="banner-zalopay" src="{{ asset('images/ZaloPay_Logo.png') }}" alt="ZaloPay">
                                <span>ZaloPay:</span>
                            </div>
                            <div class="info">0387853737 BUI KIM PHUONG</div>
                        </li>
                        <li class="payment">
                            <div class="label">
                                <img class="banner-aripay" src="{{ asset('images/aripay.jpg') }}" alt="AriPay">
                                <span>AirPay:</span>
                            </div>
                            <div class="info"> 0387853737 BUI KIM PHUONG </div>
                        </li>
                        <li class="payment">
                            <div class="label">
                                <img class="banner-momo" src="{{ asset('images/momo.png') }}" alt="MoMo">
                                <span>Momo:</span>
                            </div>
                            <div class="info">
                                0387853737 BUI KIM PHUONG
                            </div>
                        </li>
                    </ul>


                    <div class="descriptions">
                        <strong>Nội dung chuyển khoản:</strong>
                        <div class="content">Tên <span>trustfb.vn</span> + Tên Tài khoản (ví dụ: autofb.com hoangha)</div>

                    </div>

                    <div class="note">
                        <strong>Lưu ý:</strong>
                        <p>- Ghi đúng nội dung chuyển khoản</p>
                        <p>- Sau 10 phút từ khi tiền trong tài khoản bạn bị trừ mà chưa được cộng tiền, vui lòng
                            nhấn <a class="link" target="_blank" href="https://zalo.me/0387853737">vào đây</a> để được hỗ trợ.
                        </p>
                    </div>
                </div>

                <div id="tab-2" data-tab-content>
                    <div class="filter-box">


                        <form method="GET" action="{{ route('order.search') }}">
                            <div class="label">
                                <button type="submit">Lọc</button>
                            </div>
                            @csrf
                            <div class="input-group">
                                <label for="type">Loại giao dịch</label>
                                <select id="type" name="type">
                                    <option value="all" @if($params['type'] == 'all') selected @endif>All</option>
                                    @foreach($services as $service)
                                        <option value="{{ $service->code_type }}" @if($params['type'] == $service->code_type) selected @endif>{{ $service->getNameCodeType() }}</option>
                                    @endforeach
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
                                <label for="status">Trạng Thái</label>
                                <select id="status" name="status">
                                    <option value="all" @if($params['status'] == 'all') selected @endif>All</option>
                                    <option value="pending" @if($params['status'] == 'pending') selected @endif>Pending</option>
                                    <option value="doing" @if($params['status'] == 'doing') selected @endif>Doing</option>
                                    <option value="done" @if($params['status'] == 'done') selected @endif>Done</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="table">
                        <div class="row t-header">
                            <div class="cell">
                                <span>Mã giao dịch</span>
                            </div>
                            <div class="cell">
                                <span>Người đặt hàng</span>
                            </div>
                            <div class="cell">
                                <span>Loại giao dịch</span>
                            </div>
                            <div class="cell">
                                <span>Số lượng</span>
                            </div>
                            <div class="cell">
                                <span>Số tiền</span>
                            </div>
                            <div class="cell">
                                <span>Created At</span>
                            </div>
                            <div class="cell">
                                <span>Trạng thái</span>
                            </div>
                            <div class="cell">
                                <span>Hành Động</span>
                            </div>
                        </div>

                        @foreach($orders as $order)
                            <div class="row">
                                <div class="cell" data-title="Mã giao dịch">
                                    {{ $order->service->code_type.'_'.$order->id }}
                                </div>
                                <div class="cell" data-title="User">
                                    {{ $order->user->name }}
                                </div>
                                <div class="cell" data-title="Loại giao dịch">
                                    {{ $order->service->name }}
                                </div>
                                <div class="cell" data-title="Số lượng">
                                    {{ $order->number_up }}
                                </div>
                                <div class="cell" data-title="Số tiền">
                                    @if($order->service->code_type != 'recharge')
                                        {{ '-'.$order->amount }}
                                    @endif
                                </div>
                                <div class="cell" data-title="Created At">
                                    {{ $order->created_at->format('Y-m-d H:i:s') }}
                                </div>
                                <div class="cell" data-title="Trạng thái">
                                    {{ $order->status }}
                                </div>
                                <div class="cell" data-title="Hanh dong">
                                    <a href="{{ route('service.order.edit', ['service' => $order->service_id, 'order' => $order]) }}" class="btn">
                                        @if(\Illuminate\Support\Facades\Auth::user()->role == 1)
                                            Chỉnh Sữa
                                        @else
                                            Xem chi tiết
                                        @endif
                                    </a>
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
    import Button from "@/Jetstream/Button";
    export default {
        components: {Button}
    }
</script>
@endsection
