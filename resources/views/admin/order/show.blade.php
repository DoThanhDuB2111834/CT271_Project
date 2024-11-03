@extends('admin.layouts.app')
@section('content')
@php
    function formatedPrice($price)
    {
        return number_format($price, 0, ',', '.') . '₫';
    }

    $statuses = $order->order_status()->pluck('status')->toArray();
    $statusesWithoutLast = array_slice($statuses, 0, -1);
  @endphp
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Order infor</h3>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body row">
                <div class="col-md-6 col-lg-6">
                    <p class="fs-5 mb-2">Tên khách hàng: <span class="ms-3">{{$order->username}}</span></p>
                    <p class="fs-5 mb-2">Số điện thoại khách hàng: <span class="ms-3">{{$order->phone_number}}</span>
                    <p class="fs-5 mb-2">Email: <span class="ms-3">{{$order->email}}</span>
                    <p class="fs-5 mb-2">Địa chỉ: <span class="ms-3">{{$order->address}}</span>
                    </p>
                    <p class="fs-5 mb-2 flex flex-column"><span>Yêu cầu của khách hàng:</span> <span
                            class="ms-3">{{$order->description ?? 'Không có'}}</span>
                    <form action="{{route('order.update', $order->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="status">Trạng thái</label>
                            <select name="status" id="status" class="form-select form-control-lg">
                                <option value="Chờ xác nhận" {{end($statuses) == 'Chờ xác nhận' ? 'selected' : ''}} {{ in_array("Chờ xác nhận", $statusesWithoutLast) ? 'disabled' : '' }}>Chờ xác
                                    nhận</option>
                                <option value="Đang xử lý" {{end($statuses) == 'Đang xử lý' ? 'selected' : ''}} {{ in_array("Đang xử lý", $statusesWithoutLast) ? 'disabled' : '' }}>Đang xử lý
                                </option>
                                <option value="Đang giao hàng" {{end($statuses) == 'Đang giao hàng' ? 'selected' : ''}} {{ in_array("Đang giao hàng", $statusesWithoutLast) ? 'disabled' : '' }}>Đang giao hàng
                                </option>
                                <option value="Đã hoàn thành" {{end($statuses) == 'Đã hoàn thành' ? 'selected' : ''}} {{ in_array("Đã hoàn thành", $statusesWithoutLast) ? 'disabled' : '' }}>Đã hoàn thành
                                </option>
                                <option value="Đã hủy" {{end($statuses) == 'Đã hủy' ? 'selected' : ''}} {{ in_array("Đã hủy", $statusesWithoutLast) ? 'disabled' : '' }}>
                                    Đã hủy</option>

                            </select>
                        </div>
                        <button class="btn btn-success" type="submit">Cập nhật trạng thái</button>
                    </form>
                </div>
                <div class="col-md-6 col-lg-6">
                    <h1>Sản phẩm:</h1>
                    @foreach ($order->items()->with('product')->get() as $item)
                        <div class="row order-item">
                            <div class="item-image col-4"
                                style="background-image: url(<?php    echo asset($item->product->getFirstImageUrl()->url) ?>); height: 150px; background-repeat: no-repeat; background-size: cover; background-position: center;">
                            </div>
                            <div class="item-name col-5 d-flex align-items-center">{{$item->product->name}}</div>
                            <div class="item-quantity item-price fw-semibold col-3 d-flex align-items-center">
                                {{$item->quantity . ' x ' . formatedPrice($item->price)}}
                            </div>
                        </div>
                    @endforeach
                    <hr class="m-2 col-12 ">
                    <p class="col-12 text-end fw-semibold"><span class="me-3">Thành
                            tiền:</span><span class="me-5">{{formatedPrice($order->total_price)}}</span></p>
                    @foreach ($order->coupons as $coupon)
                        <p class="col-12 text-end fw-semibold"><span class="me-3">Mã giảm giá: {{$coupon->id}}</span><span
                                class="me-3">{{'-(' . $coupon->value . '%)'}}</span><span
                                class="me-5">{{ '-' . formatedPrice($coupon->value / 100 * $order->total_price)}}</span></p>
                    @endforeach
                    <hr class="m-2 col-12 ">
                    <p class="col-12 text-end fw-semibold"><span class="me-3">Tổng giá trị đơn hàng:</span><span
                            class="me-5">{{formatedPrice($order->getTotalPriceAfterCoupon())}}</span></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

<script src="{{asset('admin/base/js/base.js')}}"></script>

<!-- Notificate message -->
@if (session('message'))
    <script>
        var state = <?php    echo "'" . session()->pull('state') . "'"?>;
        var message = <?php    echo "'" . session()->pull('message') . "'"?>;
        notificate(state, message);
    </script>
    <?php
        session()->forget('state');
        session()->forget('message');
                                                                                                                                                    ?>
@endif
@endsection