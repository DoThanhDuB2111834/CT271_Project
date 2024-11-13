@extends('client.layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('client/assets/base/CSS/cartpage.css')}}">
@endsection
@section('content')
<main>
    <div class="max-w-screen-xl mx-auto mt-8 cart-section">
        <div class="cart-title text-[#0A0A0B] font-semibold text-2xl mb-14">
            Giỏ hàng
        </div>
        <div class="cart-body flex flex-col lg:flex-row gap-1">
            <div class="basis-7/12">
                <div id="cart-list"></div>

                <button id="update-cart-button"
                    class="mt-5 uppercase text-center bg-[#0A0A0B] text-white text-base font-semibold p-3">Cập
                    nhật giỏ hàng</button>
            </div>
            <div class="cart-order basis-5/12 border-[#7d7d7d] p-8 border-2">
                <h1 class="text-[#0A0A0B] text-2xl font-semibold mb-6">Tóm tắt đơn hàng</h1>
                <div class="flex flex-row justify-between mb-2">
                    <p>Thành tiền:</p>
                    <p id="cart-itemsprice" class="text-[#0A0A0B] font-semibold">0 ₫</p>
                </div>
                <p class="text-[#0A0A0B] font-semibold text-lg">Thông tin giao hàng</p>
                <p>Đối với những sản phẩm có sẵn tại khu vực, Nội thất 360 sẽ giao hàng trong vòng 2-7 ngày. Đối với
                    những
                    sản phẩm không có
                    sẵn, thời gian giao hàng sẽ được nhân viên Nội thất 360 thông báo đến quý khách.</p>
                <p class="my-5">
                    Từ 2-6: 8:30 - 17:30
                </p>
                <p class="mb-5">
                    Thứ 7, CN: 9:30 - 16:30
                </p>

                @if (!auth()->check())
                    <div class="flex flex-row justify-center w-full">
                        <button
                            class="toogle-auth-modal basis-1/2 uppercase text-center bg-[#0A0A0B] text-white text-base font-semibold p-3">
                            Đăng nhập</button>
                    </div>
                    <p class="mt-2 text-sm text-center w-full">Vui lòng đăng nhập trước khi đặt hàng</p>
                    <p class=" text-sm text-center w-full">Chưa có tài khoản? <button
                            class="toogle-auth-modal text-blue-500 underline">Đăng
                            ký</button>
                    </p>
                @else
                    <div class="flex flex-row gap-2">
                        <a href="{{route('index')}}"
                            class="basis-1/2 uppercase text-center text-[#0A0A0B] text-base font-semibold p-3 border-[#0A0A0B] border-[1px]"><i
                                class="fa-solid fa-arrow-left"></i>Tiếp
                            tục mua
                            hàng</a>
                        <a href="{{route('cart-checkout.index')}}"
                            class="basis-1/2 uppercase text-center bg-[#0A0A0B] text-white text-base font-semibold p-3">Đặt
                            hàng</a>
                    </div>
                @endif

            </div>
        </div>
    </div>
</main>
@endsection
@section('scripts')
@if (auth()->check())
    <script type="module" src="{{asset('client/assets/base/JS/handleCartPageForUser.js')}}"></script>
@else
    <script type="module" src="{{asset('client/assets/base/JS/handllerCartPageForGuestUser.js')}}"></script>
@endif
@endsection