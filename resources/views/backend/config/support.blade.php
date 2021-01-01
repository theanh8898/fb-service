@extends('backend.layouts.app')
@section('style')
@endsection

@section('content')
    <div class="content">
        <!-- load content here -->
        <div class="support-page">
            <h3 class="title">Hỗ trợ</h3>
            <div>
                <p>Mọi thắc mắc vui lòng liên hệ qua:</p>
                <p><span>Hotline:</span> <a href="tel:0387853737">0387853737</a> - Thảo Phương</p>
                <p><span>Zalo:</span> <a  href="https://zalo.me/0387853737">0387853737</a> - Thảo Phương</p>
            </div>

            <div class="modal modal--open">
                <div class="modal__overlay"></div>
                <div class="modal__body">
                    <div class="contact-wrapper">
                        <div class="content">Mọi vấn đề cần trợ giúp vui lòng liên hệ qua <span>Zalo</span></div>
                        <div class="buttons">
                            <button onclick="closeModal()" class="cancel" >Hủy bỏ</button>
                            <button onclick="redirectModal(`https://zalo.me/0387853737`)" class="accept">
                                Đồng ý
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end load content -->
        </div>
    </div>

@endsection

@section('script')
    <script>
    </script>
@endsection
