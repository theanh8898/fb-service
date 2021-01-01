@extends('backend.layouts.app')
@section('style')
@endsection

@section('content')
    <div class="content">
        <div class="recharge-page">
            <ul class="navbar-tabs">
                <li data-tab-target="#tab-1">Nạp tiền</li>
                <li class="active" data-tab-target="#tab-2">Danh sách dịch vụ</li>
            </ul>

            <div class="content-tabs">

                <div id="tab-2" data-tab-content>
                    <div class="mb-10">
                        <a href="{{ route('service.create') }}" class="btn" title="Tạo mới dịch vụ">Tạo mới dịch vụ</a>
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
                                <span>Mã dịch vụ</span>
                            </div>
                            <div class="cell">
                                <span>Giá tiền</span>
                            </div>
                            <div class="cell">
                                <span>Số lượng ứng với giá</span>
                            </div>
                            <div class="cell">
                                <span>Hành Động</span>
                            </div>
                        </div>

                        @foreach($services as $service)
                            <div class="row">
                                <div class="cell" data-title="STT">
                                    {{ $service->id }}
                                </div>
                                <div class="cell" data-title="Loại giao dịch">
                                    {{ $service->name }}
                                </div>
                                <div class="cell" data-title="Mã giao dịch">
                                    {{ $service->code_type }}
                                </div>
                                <div class="cell" data-title="Giá tiền">
                                    {{ $service->price }}
                                </div>
                                <div class="cell" data-title="Số lượng ứng với giá">
                                    {{ $service->number_of_price }}
                                </div>
                                <div class="cell" data-title="Hanh dong">
                                    <a href="{{ route('service.edit', ['service' => $service->id]) }}" class="btn" title="Chỉnh Sửa">Chỉnh Sữa</a>
                                    <a href="{{ route('service.destroy', ['service' => $service]) }}" class="btn" title="Xóa">Xóa</a>
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
