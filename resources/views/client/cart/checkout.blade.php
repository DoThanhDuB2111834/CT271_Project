@extends('client.layouts.app')
@section('content')
<form method="post" action="{{route('cart-checkout.store')}}"
    class="max-w-screen-xl mx-auto mt-8 order-section flex flex-col lg:flex-row">
    @csrf
    <div class="user-infor basis-7/12">
        <h1 class="user-infor-title mb-4 uppercase text-2xl font-semibold text-[#0A0A0B]">Thông tin giao hàng</h1>
        <div class="flex flex-col lg:flex-row flex-wrap">
            <div class="form-control pr-6 basis-1/2 flex flex-col mt-8">
                <label for="username" class="text-sm mb-2">Tên *</label>
                <input type="text" id="username"
                    class="outline-none p-2 border-[#eaeaead9] border-[1px] shadow-sm shadow-gray-400" name="username"
                    value="{{old('username') ?? $user->name}}">
                @error('username')
                    <span class="text-red-400"> {{ $message }}</span>
                @enderror
            </div>
            <div class="form-control pr-6 basis-1/2 flex flex-col mt-8">
                <label for="phone_number" class="text-sm mb-2">Số điện thoại *</label>
                <input type="text" id="phone_number"
                    class="outline-none p-2 border-[#eaeaead9] border-[1px] shadow-sm shadow-gray-400"
                    name="phone_number" value="{{old('phone_number') ?? $user->phone_number}}">
                @error('phone_number')
                    <span class="text-red-400"> {{ $message }}</span>
                @enderror
            </div>

            <div class="form-control pr-6 flex flex-col mt-8 w-full">
                <label for="address" class="text-sm mb-2">Địa chỉ *</label>
                <input type="text" id="address"
                    class="outline-none p-2 border-[#eaeaead9] border-[1px] shadow-sm shadow-gray-400" name="address"
                    value="{{old('address') ?? $user->address}}">
                @error('address')
                    <span class="text-red-400"> {{ $address }}</span>
                @enderror
            </div>

            <div class="form-control pr-6 flex flex-col mt-8 w-full">
                <label for="email" class="text-sm mb-2">Địa chỉ Email *</label>
                <input type="email" id="email"
                    class="outline-none p-2 border-[#eaeaead9] border-[1px] shadow-sm shadow-gray-400" name="email"
                    value="{{old('email') ?? $user->email}}">
                @error('email')
                    <span class="text-red-400"> {{ $address }}</span>
                @enderror
            </div>
            <div class="form-control pr-6 flex flex-col mt-8 w-full">
                <label for="customer_note" class="text-lg font-semibold text-[#0A0A0B] mb-2">Lưu ý cho đơn hàng (tùy
                    chọn)</label>
                <textarea name="customer_note" id="customer_note" rows="5"
                    class="outline-none p-2 border-[#eaeaead9] border-[1px] shadow-sm shadow-gray-400"
                    value="{{old('description') ?? ''}}"></textarea>
            </div>
        </div>
    </div>
    <div class="cart-infor basis-5/12 border-[#7d7d7d] p-8 border-2">
        <h1 class="text-[#0A0A0B] text-2xl font-semibold mb-6">Tóm tắt đơn hàng</h1>
        <div class="flex flex-row justify-between mb-2">
            <p>Thành tiền:</p>
            <p id="cart-itemsprice" class="text-[#0A0A0B] font-semibold">0 ₫</p>
        </div>
        <div id="coupon-cartpage-list" class="mt-3">
        </div>
        <hr>
        <div class="flex flex-row justify-between mb-8 mt-3">
            <p>Tổng cộng:</p>
            <p id="cart-totalprice" class="text-[#0A0A0B] font-semibold">0 ₫</p>
        </div>

        <div class="coupon-controll flex flex-row my-6">
            <input type="text" id="coupon-input"
                class="outline-none basis-3/4 border-[#7d7d7d] border-[1px] px-4 shadow-lg shadow-gray-400"
                placeholder="Mã giảm giá">
            <button id="find-coupon"
                class="uppercase basis-1/4 block shadow-lg shadow-gray-400 bg-[#0a0a0b] text-white text-base text-center font-medium px-4 py-2 ml-1 lg:my-0 lg:ml-1 ">Sử
                dụng</button>
        </div>

        <div id="cart-infor-items">
            <h2 class="cart-infor-items-title text-[#0A0A0B] text-lg font-medium">Sản phẩm</h2>
            <div id="cart-infor-items-body">
                <!-- <hr class="m-4">
                <div class="cari-item-infor flex flex-row">

                    <div class="cart-item-image basis-1/4 h-[90px] bg-cover bg-no-repeat bg-center"
                        style="background-image: <?php echo "url(" . asset('Image/product/1000-ghe-roma-768x511.jpg') . ")" ?>;">
                    </div>
                    <div class="cart-item-name basis-2/4 flex items-center justify-center">Bàn ăn roma <span
                            class="font-bold ml-2 text-lg">x 1</span></div>
                    <div class="cart-item-price basis-1/4 flex items-center justify-center">13,900,000d</div>
                </div> -->
            </div>
        </div>

        <div class="flex flex-row justify-center w-full">
            <button type="submit"
                class=" basis-1/2 uppercase text-center bg-[#0A0A0B] text-white text-base font-semibold p-3">
                Đặt mua</button>
        </div>


    </div>
</form>
@endsection
@section('scripts')
<script type="module" src="{{asset('client/assets/base/JS/handleCartCheckoutPage.js')}}"></script>
@endsection