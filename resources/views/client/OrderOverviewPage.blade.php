@extends('client.layouts.app')
@php
    function formatedPrice($price)
    {
        return number_format($price, 0, ',', '.') . '₫';
    }
@endphp
@section('css')
<link rel="stylesheet" href="{{asset('client/assets/base/CSS/ProductDetailPage.css')}}">
<style>
    .product-item {
        display: none;
    }

    .product-item:first-child {
        display: flex;
        /* Hiển thị sản phẩm đầu tiên */
    }
</style>
@endsection
@section('content')
<div class="max-w-screen-xl mx-auto mt-16">
    <hr class="mb-8">
    <div class="flex flex-col lg:flex-row gap-8">
        @include('client.layouts.ProfileAppDrawer')
        <div class="form-sections basis-9/12">
            <h1 class="text-3xl text-[#0A0A0B] font-semibold">Đơn hàng của tôi</h1>
            <div class="tabs flex flex-col lg:flex-row mt-6">
                <div class="tab text-[#7d7d7d] mr-3 font-medium  active-tab" onclick="showTabContent(event, 'tab1')">Tất
                    cả đơn hàng
                </div>
                <div class="tab text-[#7d7d7d] mr-3 font-medium " onclick="showTabContent(event, 'tab2')">
                    Chờ xác nhận
                </div>
                <div class="tab text-[#7d7d7d] mr-3 font-medium " onclick="showTabContent(event, 'tab3')">
                    Đang xử lý
                </div>
                <div class="tab text-[#7d7d7d] mr-3 font-medium " onclick="showTabContent(event, 'tab4')">
                    Đang giao
                </div>
                <div class="tab text-[#7d7d7d] mr-3 font-medium " onclick="showTabContent(event, 'tab5')">
                    Đã hoàn thành
                </div>
                <div class="tab text-[#7d7d7d] mr-3 font-medium " onclick="showTabContent(event, 'tab6')">
                    Đã hủy
                </div>
            </div>

            <div id="tab1" class="tab-content mt-3 show">
                @foreach ($orders as $order)
                    <div class="order-item my-10">
                        <div class="order-item-title w-full py-2 px-4 flex flex-row justify-between bg-[#efefef]">
                            <h2>Mã đơn hàng: {{$order->id}}</h2>
                            <div>
                                <p>Trạng thái: {{$order->getCurrentStatus()}}</p>
                                <p class="text-gray-500">Ngày đặt: {{$order->created_at}}</p>
                            </div>
                        </div>
                        <div class="order-item-body mt-2">
                            <div class="infor basis-5/12">
                                <p class=""><span class="mr-2 text-[#0A0A0B] font-semibold">Họ và tên khách hàng:
                                    </span><span>{{$order->username}}</span></p>
                                <p class="mt-2"><span class="mr-2 text-[#0A0A0B] font-semibold">Email:
                                    </span><span>{{$order->email}}</span></p>
                                <p class="mt-2"><span class="mr-2 text-[#0A0A0B] font-semibold">Số điện thoại:
                                    </span><span>{{$order->phone_number}}</span>
                                </p>
                                <p class="mt-2"><span class="mr-2 text-[#0A0A0B] font-semibold">Địa chỉ:
                                    </span><span>{{$order->address}}</span></p>
                                <p class="mt-2"><span class="mr-2 text-[#0A0A0B] font-semibold">Ghi chú của khách:
                                    </span><br><span>{{$order->description ?? 'Không có'}}</span></p>

                                <div class="order_price mt-4 flex flex-row justify-between">
                                    <p class="text-[#0A0A0B] font-semibold">Thành tiền: </p>
                                    <p>{{formatedPrice($order->total_price)}}</p>
                                </div>
                                @if (count($order->coupons) > 0)
                                    <div class="order_coupon mt-2">
                                        <p class="text-[#0A0A0B] font-semibold">Giảm giá: </p>
                                        <ul>
                                            @foreach ($order->coupons as $coupon)
                                                <li class="flex flex-row justify-end gap-2">
                                                    <span>{{'(-' . $coupon->value . '%)'}}</span><span>{{'-' . formatedPrice($coupon->value / 100 * $order->total_price)}}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <hr class="my-2">
                                <div class="order_price flex flex-row justify-between text-[#0A0A0B] font-semibold">
                                    <p>Tổng cộng: </p>
                                    <p>{{formatedPrice($order->getTotalPriceAfterCoupon())}}</p>
                                </div>
                            </div>
                            <div id="products" class="basis-7/12 flex flex-col">
                                @foreach ($order->items()->with('product')->get() as $item)
                                    <div class="product-item flex-row transition-all duration-300 mb-3">
                                        <div class="product-image basis-5/12 bg-cover bg-no-repeat bg-center h-[150px]"
                                            style="background-image: url(<?php        echo asset($item->product->getFirstImageUrl()->url) ?>);">
                                        </div>
                                        <div class="product-name basis-4/12 flex items-center">{{$item->product->name}}</div>
                                        <div
                                            class="product-price product-quantity basis-3/12 flex items-center text-[#0A0A0B] font-semibold">
                                            {{formatedPrice($item->price) . ' x ' . $item->quantity}}
                                        </div>
                                    </div>
                                @endforeach
                                <button class="toggleButton self-center underline text-blue-400">Mở rộng</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div id="tab2" class="tab-content mt-3">
                @foreach ($orders as $order)
                    @if ($order->getCurrentStatus() == 'Chờ xác nhận')
                        <div class="order-item my-10">
                            <div class="order-item-title w-full py-2 px-4 bg-[#efefef] flex flex-row justify-between">
                                <p>Mã đơn hàng: {{$order->id}}</p>
                                <p class="text-gray-500">Ngày đặt: {{$order->created_at}}</p>
                            </div>
                            <div class="order-item-body mt-2">
                                <div class="infor basis-5/12">
                                    <p class=""><span class="mr-2 text-[#0A0A0B] font-semibold">Họ và tên khách hàng:
                                        </span><span>{{$order->username}}</span></p>
                                    <p class="mt-2"><span class="mr-2 text-[#0A0A0B] font-semibold">Email:
                                        </span><span>{{$order->email}}</span></p>
                                    <p class="mt-2"><span class="mr-2 text-[#0A0A0B] font-semibold">Số điện thoại:
                                        </span><span>{{$order->phone_number}}</span>
                                    </p>
                                    <p class="mt-2"><span class="mr-2 text-[#0A0A0B] font-semibold">Địa chỉ:
                                        </span><span>{{$order->address}}</span></p>
                                    <p class="mt-2"><span class="mr-2 text-[#0A0A0B] font-semibold">Ghi chú của khách:
                                        </span><br><span>{{$order->description ?? 'Không có'}}</span></p>

                                    <div class="order_price mt-4 flex flex-row justify-between">
                                        <p class="text-[#0A0A0B] font-semibold">Thành tiền: </p>
                                        <p>{{formatedPrice($order->total_price)}}</p>
                                    </div>
                                    @if (count($order->coupons) > 0)
                                        <div class="order_coupon mt-2">
                                            <p class="text-[#0A0A0B] font-semibold">Giảm giá: </p>
                                            <ul>
                                                @foreach ($order->coupons as $coupon)
                                                    <li class="flex flex-row justify-end gap-2">
                                                        <span>{{'(-' . $coupon->value . '%)'}}</span><span>{{'-' . formatedPrice($coupon->value / 100 * $order->total_price)}}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <hr class="my-2">
                                    <div class="order_price flex flex-row justify-between text-[#0A0A0B] font-semibold">
                                        <p>Tổng cộng: </p>
                                        <p>{{formatedPrice($order->getTotalPriceAfterCoupon())}}</p>
                                    </div>
                                </div>
                                <div id="products" class="basis-7/12 flex flex-col">
                                    @foreach ($order->items()->with('product')->get() as $item)
                                        <div class="product-item flex-row transition-all duration-300 mb-3">
                                            <div class="product-image basis-5/12 bg-cover bg-no-repeat bg-center h-[150px]"
                                                style="background-image: url(<?php            echo asset($item->product->getFirstImageUrl()->url) ?>);">
                                            </div>
                                            <div class="product-name basis-4/12 flex items-center">{{$item->product->name}}</div>
                                            <div
                                                class="product-price product-quantity basis-3/12 flex items-center text-[#0A0A0B] font-semibold">
                                                {{formatedPrice($item->price) . ' x ' . $item->quantity}}
                                            </div>
                                        </div>
                                    @endforeach
                                    <button class="toggleButton self-center underline text-blue-400">Mở rộng</button>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <div id="tab3" class="tab-content mt-3">
                @foreach ($orders as $order)
                    @if ($order->getCurrentStatus() == 'Đang xử lý')
                        <div class="order-item my-10">
                            <div class="order-item-title w-full py-2 px-4 bg-[#efefef] flex flex-row justify-between">
                                <p>Mã đơn hàng: {{$order->id}}</p>
                                <p class="text-gray-500">Ngày đặt: {{$order->created_at}}</p>
                            </div>
                            <div class="order-item-body mt-2">
                                <div class="infor basis-5/12">
                                    <p class=""><span class="mr-2 text-[#0A0A0B] font-semibold">Họ và tên khách hàng:
                                        </span><span>{{$order->username}}</span></p>
                                    <p class="mt-2"><span class="mr-2 text-[#0A0A0B] font-semibold">Email:
                                        </span><span>{{$order->email}}</span></p>
                                    <p class="mt-2"><span class="mr-2 text-[#0A0A0B] font-semibold">Số điện thoại:
                                        </span><span>{{$order->phone_number}}</span>
                                    </p>
                                    <p class="mt-2"><span class="mr-2 text-[#0A0A0B] font-semibold">Địa chỉ:
                                        </span><span>{{$order->address}}</span></p>
                                    <p class="mt-2"><span class="mr-2 text-[#0A0A0B] font-semibold">Ghi chú của khách:
                                        </span><br><span>{{$order->description ?? 'Không có'}}</span></p>

                                    <div class="order_price mt-4 flex flex-row justify-between">
                                        <p class="text-[#0A0A0B] font-semibold">Thành tiền: </p>
                                        <p>{{formatedPrice($order->total_price)}}</p>
                                    </div>
                                    @if (count($order->coupons) > 0)
                                        <div class="order_coupon mt-2">
                                            <p class="text-[#0A0A0B] font-semibold">Giảm giá: </p>
                                            <ul>
                                                @foreach ($order->coupons as $coupon)
                                                    <li class="flex flex-row justify-end gap-2">
                                                        <span>{{'(-' . $coupon->value . '%)'}}</span><span>{{'-' . formatedPrice($coupon->value / 100 * $order->total_price)}}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <hr class="my-2">
                                    <div class="order_price flex flex-row justify-between text-[#0A0A0B] font-semibold">
                                        <p>Tổng cộng: </p>
                                        <p>{{formatedPrice($order->getTotalPriceAfterCoupon())}}</p>
                                    </div>
                                </div>
                                <div id="products" class="basis-7/12 flex flex-col">
                                    @foreach ($order->items()->with('product')->get() as $item)
                                        <div class="product-item flex-row transition-all duration-300 mb-3">
                                            <div class="product-image basis-5/12 bg-cover bg-no-repeat bg-center h-[150px]"
                                                style="background-image: url(<?php            echo asset($item->product->getFirstImageUrl()->url) ?>);">
                                            </div>
                                            <div class="product-name basis-4/12 flex items-center">{{$item->product->name}}</div>
                                            <div
                                                class="product-price product-quantity basis-3/12 flex items-center text-[#0A0A0B] font-semibold">
                                                {{formatedPrice($item->price) . ' x ' . $item->quantity}}
                                            </div>
                                        </div>
                                    @endforeach
                                    <button class="toggleButton self-center underline text-blue-400">Mở rộng</button>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div id="tab4" class="tab-content mt-3">
                @foreach ($orders as $order)
                    @if ($order->getCurrentStatus() == 'Đang giao')
                        <div class="order-item my-10">
                            <div class="order-item-title w-full py-2 px-4 bg-[#efefef] flex flex-row justify-between">
                                <p>Mã đơn hàng: {{$order->id}}</p>
                                <p class="text-gray-500">Ngày đặt: {{$order->created_at}}</p>
                            </div>
                            <div class="order-item-body mt-2">
                                <div class="infor basis-5/12">
                                    <p class=""><span class="mr-2 text-[#0A0A0B] font-semibold">Họ và tên khách hàng:
                                        </span><span>{{$order->username}}</span></p>
                                    <p class="mt-2"><span class="mr-2 text-[#0A0A0B] font-semibold">Email:
                                        </span><span>{{$order->email}}</span></p>
                                    <p class="mt-2"><span class="mr-2 text-[#0A0A0B] font-semibold">Số điện thoại:
                                        </span><span>{{$order->phone_number}}</span>
                                    </p>
                                    <p class="mt-2"><span class="mr-2 text-[#0A0A0B] font-semibold">Địa chỉ:
                                        </span><span>{{$order->address}}</span></p>
                                    <p class="mt-2"><span class="mr-2 text-[#0A0A0B] font-semibold">Ghi chú của khách:
                                        </span><br><span>{{$order->description ?? 'Không có'}}</span></p>

                                    <div class="order_price mt-4 flex flex-row justify-between">
                                        <p class="text-[#0A0A0B] font-semibold">Thành tiền: </p>
                                        <p>{{formatedPrice($order->total_price)}}</p>
                                    </div>
                                    @if (count($order->coupons) > 0)
                                        <div class="order_coupon mt-2">
                                            <p class="text-[#0A0A0B] font-semibold">Giảm giá: </p>
                                            <ul>
                                                @foreach ($order->coupons as $coupon)
                                                    <li class="flex flex-row justify-end gap-2">
                                                        <span>{{'(-' . $coupon->value . '%)'}}</span><span>{{'-' . formatedPrice($coupon->value / 100 * $order->total_price)}}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <hr class="my-2">
                                    <div class="order_price flex flex-row justify-between text-[#0A0A0B] font-semibold">
                                        <p>Tổng cộng: </p>
                                        <p>{{formatedPrice($order->getTotalPriceAfterCoupon())}}</p>
                                    </div>
                                </div>
                                <div id="products" class="basis-7/12 flex flex-col">
                                    @foreach ($order->items()->with('product')->get() as $item)
                                        <div class="product-item flex-row transition-all duration-300 mb-3">
                                            <div class="product-image basis-5/12 bg-cover bg-no-repeat bg-center h-[150px]"
                                                style="background-image: url(<?php            echo asset($item->product->getFirstImageUrl()->url) ?>);">
                                            </div>
                                            <div class="product-name basis-4/12 flex items-center">{{$item->product->name}}</div>
                                            <div
                                                class="product-price product-quantity basis-3/12 flex items-center text-[#0A0A0B] font-semibold">
                                                {{formatedPrice($item->price) . ' x ' . $item->quantity}}
                                            </div>
                                        </div>
                                    @endforeach
                                    <button class="toggleButton self-center underline text-blue-400">Mở rộng</button>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div id="tab5" class="tab-content mt-3">
                @foreach ($orders as $order)
                    @if ($order->getCurrentStatus() == 'Đã hoàn thành')
                        <div class="order-item my-10">
                            <div class="order-item-title w-full py-2 px-4 bg-[#efefef] flex flex-row justify-between">
                                <p>Mã đơn hàng: {{$order->id}}</p>
                                <p class="text-gray-500">Ngày đặt: {{$order->created_at}}</p>
                            </div>
                            <div class="order-item-body mt-2">
                                <div class="infor basis-5/12">
                                    <p class=""><span class="mr-2 text-[#0A0A0B] font-semibold">Họ và tên khách hàng:
                                        </span><span>{{$order->username}}</span></p>
                                    <p class="mt-2"><span class="mr-2 text-[#0A0A0B] font-semibold">Email:
                                        </span><span>{{$order->email}}</span></p>
                                    <p class="mt-2"><span class="mr-2 text-[#0A0A0B] font-semibold">Số điện thoại:
                                        </span><span>{{$order->phone_number}}</span>
                                    </p>
                                    <p class="mt-2"><span class="mr-2 text-[#0A0A0B] font-semibold">Địa chỉ:
                                        </span><span>{{$order->address}}</span></p>
                                    <p class="mt-2"><span class="mr-2 text-[#0A0A0B] font-semibold">Ghi chú của khách:
                                        </span><br><span>{{$order->description ?? 'Không có'}}</span></p>

                                    <div class="order_price mt-4 flex flex-row justify-between">
                                        <p class="text-[#0A0A0B] font-semibold">Thành tiền: </p>
                                        <p>{{formatedPrice($order->total_price)}}</p>
                                    </div>
                                    @if (count($order->coupons) > 0)
                                        <div class="order_coupon mt-2">
                                            <p class="text-[#0A0A0B] font-semibold">Giảm giá: </p>
                                            <ul>
                                                @foreach ($order->coupons as $coupon)
                                                    <li class="flex flex-row justify-end gap-2">
                                                        <span>{{'(-' . $coupon->value . '%)'}}</span><span>{{'-' . formatedPrice($coupon->value / 100 * $order->total_price)}}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <hr class="my-2">
                                    <div class="order_price flex flex-row justify-between text-[#0A0A0B] font-semibold">
                                        <p>Tổng cộng: </p>
                                        <p>{{formatedPrice($order->getTotalPriceAfterCoupon())}}</p>
                                    </div>
                                </div>
                                <div id="products" class="basis-7/12 flex flex-col">
                                    @foreach ($order->items()->with('product')->get() as $item)
                                        <div class="product-item flex-row transition-all duration-300 mb-3">
                                            <div class="product-image basis-5/12 bg-cover bg-no-repeat bg-center h-[150px]"
                                                style="background-image: url(<?php            echo asset($item->product->getFirstImageUrl()->url) ?>);">
                                            </div>
                                            <div class="product-name basis-4/12 flex items-center">{{$item->product->name}}</div>
                                            <div
                                                class="product-price product-quantity basis-3/12 flex items-center text-[#0A0A0B] font-semibold">
                                                {{formatedPrice($item->price) . ' x ' . $item->quantity}}
                                            </div>
                                        </div>
                                    @endforeach
                                    <button class="toggleButton self-center underline text-blue-400">Mở rộng</button>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div id="tab6" class="tab-content mt-3">
                @foreach ($orders as $order)
                    @if ($order->getCurrentStatus() == 'Đã hủy')
                        <div class="order-item my-10">
                            <div class="order-item-title w-full py-2 px-4 bg-[#efefef] flex flex-row justify-between">
                                <p>Mã đơn hàng: {{$order->id}}</p>
                                <p class="text-gray-500">Ngày đặt: {{$order->created_at}}</p>
                            </div>
                            <div class="order-item-body mt-2">
                                <div class="infor basis-5/12">
                                    <p class=""><span class="mr-2 text-[#0A0A0B] font-semibold">Họ và tên khách hàng:
                                        </span><span>{{$order->username}}</span></p>
                                    <p class="mt-2"><span class="mr-2 text-[#0A0A0B] font-semibold">Email:
                                        </span><span>{{$order->email}}</span></p>
                                    <p class="mt-2"><span class="mr-2 text-[#0A0A0B] font-semibold">Số điện thoại:
                                        </span><span>{{$order->phone_number}}</span>
                                    </p>
                                    <p class="mt-2"><span class="mr-2 text-[#0A0A0B] font-semibold">Địa chỉ:
                                        </span><span>{{$order->address}}</span></p>
                                    <p class="mt-2"><span class="mr-2 text-[#0A0A0B] font-semibold">Ghi chú của khách:
                                        </span><br><span>{{$order->description ?? 'Không có'}}</span></p>

                                    <div class="order_price mt-4 flex flex-row justify-between">
                                        <p class="text-[#0A0A0B] font-semibold">Thành tiền: </p>
                                        <p>{{formatedPrice($order->total_price)}}</p>
                                    </div>
                                    @if (count($order->coupons) > 0)
                                        <div class="order_coupon mt-2">
                                            <p class="text-[#0A0A0B] font-semibold">Giảm giá: </p>
                                            <ul>
                                                @foreach ($order->coupons as $coupon)
                                                    <li class="flex flex-row justify-end gap-2">
                                                        <span>{{'(-' . $coupon->value . '%)'}}</span><span>{{'-' . formatedPrice($coupon->value / 100 * $order->total_price)}}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <hr class="my-2">
                                    <div class="order_price flex flex-row justify-between text-[#0A0A0B] font-semibold">
                                        <p>Tổng cộng: </p>
                                        <p>{{formatedPrice($order->getTotalPriceAfterCoupon())}}</p>
                                    </div>
                                </div>
                                <div id="products" class="basis-7/12 flex flex-col">
                                    @foreach ($order->items()->with('product')->get() as $item)
                                        <div class="product-item flex-row transition-all duration-300 mb-3">
                                            <div class="product-image basis-5/12 bg-cover bg-no-repeat bg-center h-[150px]"
                                                style="background-image: url(<?php            echo asset($item->product->getFirstImageUrl()->url) ?>);">
                                            </div>
                                            <div class="product-name basis-4/12 flex items-center">{{$item->product->name}}</div>
                                            <div
                                                class="product-price product-quantity basis-3/12 flex items-center text-[#0A0A0B] font-semibold">
                                                {{formatedPrice($item->price) . ' x ' . $item->quantity}}
                                            </div>
                                        </div>
                                    @endforeach
                                    <button class="toggleButton self-center underline text-blue-400">Mở rộng</button>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    function showTabContent(event, tabId) {
        // Ẩn tất cả nội dung tab
        const tabContents = document.querySelectorAll('.tab-content');
        tabContents.forEach(content => content.classList.remove('show'));

        // Xóa lớp active cho tất cả tab
        const tabs = document.querySelectorAll('.tab');
        tabs.forEach(tab => tab.classList.remove('active-tab'));

        // Hiển thị nội dung tab được chọn
        document.getElementById(tabId).classList.add('show');

        // Thêm lớp active cho tab được chọn
        event.currentTarget.classList.add('active-tab');
    }

    document.querySelectorAll('.toggleButton').forEach(button => {
        button.addEventListener('click', function () {
            const container = this.parentElement;
            const products = container.querySelectorAll('.product-item');
            const isExpanded = this.getAttribute('data-expanded') === 'true';
            if (isExpanded) {
                products.forEach((product, index) => {
                    product.style.display = index === 0 ? 'flex' : 'none';
                });
                this.textContent = 'Mở rộng';
            } else {
                products.forEach(product => { product.style.display = 'flex'; });
                this.textContent = 'Thu nhỏ';
            }
            this.setAttribute('data-expanded', !isExpanded);
        });
    });
</script>
@endsection