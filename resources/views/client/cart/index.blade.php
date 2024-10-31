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
                <!-- <div class="cart-item mt-10 flex flex-row">
                    <div class="cart-item-image basis-1/4 h-[110px] bg-cover bg-no-repeat bg-center"
                        style="background-image: url(<?php echo asset('Image/product/armchair-tet-vai-vact10499.jpg') ?>);">
                    </div>
                    <div class="flex flex-row justify-between basis-3/4">
                        <div class="cart-item-infor basis-3/4">
                            <h1 class="text-[#0A0A0B]">Armchair Ogami vải vact10499</h1>
                            <p class="text-[#7d7d7d] text-sm mt-5">Kích thước: D820 - R720 - C730 mm</p>
                            <p class="text-[#BC5B64] mt-2">8900000d</p>
                        </div>
                        <div class="cart-item-action basis-1/4 flex flex-col justify-around">
                            <button class="toogle-cart-button">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                            <div class="quantity-control">
                                <button class="btn-decrease" data-id="">-</button>
                                <input type="number" id="quantityOfProduct" value="1" min="1">
                                <button class="btn-increase" data-id="">+</button>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div id="cart-list"></div>
                <hr>
                <button id="update-cart-button"
                    class="mt-3 uppercase text-center bg-[#0A0A0B] text-white text-base font-semibold p-3">Cập
                    nhật giỏ hàng</button>
            </div>
            <div class="cart-order basis-5/12 border-[#7d7d7d] p-8 border-2">
                <h1 class="text-[#0A0A0B] text-2xl font-semibold mb-6">Tóm tắt đơn hàng</h1>
                <div class="flex flex-row justify-between mb-2">
                    <p>Thành tiền:</p>
                    <p id="cart-totalprice" class="text-[#0A0A0B] font-semibold">100000000d</p>
                </div>
                <hr>
                <div class="coupon-controll flex flex-row my-6">
                    <input type="text"
                        class="outline-none basis-3/4 border-[#7d7d7d] border-[1px] px-4 shadow-lg shadow-gray-400"
                        placeholder="Mã giảm giá">
                    <button
                        class="uppercase basis-1/4 block shadow-lg shadow-gray-400 bg-[#0a0a0b] text-white text-base text-center font-medium px-4 py-2 ml-1 lg:my-0 lg:ml-1 ">Sử
                        dụng</button>
                </div>
                <div class="flex flex-row justify-between mb-8">
                    <p>Tổng cộng:</p>
                    <p id="cart-totalprice" class="text-[#0A0A0B] font-semibold">100000000d</p>
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
                        <a href=""
                            class=" basis-1/2 uppercase text-center bg-[#0A0A0B] text-white text-base font-semibold p-3">
                            Đăng nhập</a>
                    </div>
                    <p class="mt-2 text-sm text-center w-full">Vui lòng đăng nhập trước khi đặt hàng</p>
                    <p class=" text-sm text-center w-full">Chưa có tài khoản? <a href=""
                            class="text-blue-500 underline">Đăng ký</a>
                    </p>
                @else
                    <div class="flex flex-row gap-2">
                        <a href="{{route('index')}}"
                            class="basis-1/2 uppercase text-center text-[#0A0A0B] text-base font-semibold p-3 border-[#0A0A0B] border-[1px]"><i
                                class="fa-solid fa-arrow-left"></i>Tiếp
                            tục mua
                            hàng</a>
                        <a href=""
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