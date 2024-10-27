@extends('client.layouts.app')
@section('css')

@endsection
@section('slider')
<div class="slider-categories flex flex-col lg:flex-row gap-4 mt-5 p-3">
    <a href="{{route('showCategoryDetail', 'Sofa')}}"
        class="slider lg:basis-1/2 h-[500px] bg-cover bg-no-repeat bg-center flex justify-center items-center"
        style="background-image: url(<?php echo asset('Image/slider/BST-COASTAL-SOFA-VANG-2.jpg') ?>);">
        <div class="uppercase text-white text-4xl font-bold">
            sofa
        </div>
    </a>
    <div class="lg:basis-1/2 grid grid-rows-4 grid-cols-1 lg:grid-rows-2 lg:grid-cols-2 gap-4">
        <a href="{{route('showCategoryDetail', 'Bàn ăn')}}"
            class="slider h-[230px] bg-cover bg-no-repeat bg-center flex justify-center items-center"
            style="background-image: url(<?php echo asset('Image/slider/nha-xinh-banner-ban-an-vuong-24423.jpg') ?>);">
            <div class="uppercase text-white text-2xl font-bold">
                Bàn ăn
            </div>
        </a>
        <a href="{{route('showCategoryDetail', 'Giường')}}"
            class="slider h-[230px] bg-cover bg-no-repeat bg-center flex justify-center items-center"
            style="background-image: url(<?php echo asset('Image/slider/giuong-ngu-pio-1.jpg') ?>);">
            <div class="uppercase text-white text-2xl font-bold">
                Giường
            </div>
        </a>
        <a href="{{route('showCategoryDetail', 'Armchair')}}"
            class="slider h-[230px] bg-cover bg-no-repeat bg-center flex justify-center items-center"
            style="background-image: url(<?php echo asset('Image/slider/banner-armchair-nhaxinh-31-1-24.jpg') ?>);">
            <div class="uppercase text-white text-2xl font-bold">
                Armchair
            </div>
        </a>
        <a href="{{route('showCategoryDetail', ' Ghế ăn')}}"
            class="slider h-[230px] bg-cover bg-no-repeat bg-center flex justify-center items-center"
            style="background-image: url(<?php echo asset('Image/slider/nha-xinh-ghe-an-phong-an-749x800.jpg') ?>);">
            <div class="uppercase text-white text-2xl font-bold">
                Ghế ăn
            </div>
        </a>
    </div>
</div>
@endsection

@section('content')
<main>
    <div class="slider-service flex flex-col lg:flex-row mt-4 bg-[#ebebeb]">
        <div class="basis-1/2 px-4 lg:px-40 py-20">
            <h1 class="uppercase font-semibold text-4xl text-center">Nội thất tinh tế</h1>
            <p class="mt-4 text-xl font-light text-center">Với kinh nghiệm hơn 24 năm trong hoàn thiện nội thất,
                Nhà Xinh
                mang đến
                giải pháp toàn diện trong
                bao gồm thiết kế,
                trang trí và cung cấp nội thất trọn gói. Sở hữu đội ngũ chuyên nghiệp và hệ thống 10 cửa hàng,
                Nhà Xinh là lựa chọn cho
                không gian tinh tế và hiện đại.</p>
        </div>
        <div class="slider basis-1/2 h-[500px] bg-cover bg-no-repeat bg-center"
            style="background-image: url(<?php echo asset('Image/slider/nha-xinh-thiet-ke-noi-that-ecopark-16523-1200x800.jpg') ?>);">
        </div>
    </div>
    <div class="max-w-screen-xl mx-auto mt-8 new-product-section">
        <div class="title flex flex-col lg:flex-row items-center">
            <h1 class="uppercase text-xl">Sản phẩm mới</h1>
            <a href="" class="ml-4">Xem tất cả <i class="fa-solid fa-chevron-right"></i></a>
        </div>
        <hr>
        <div class="content flex flex-col lg:flex-row mt-5">
            @foreach ($newProducts as $item)
                <div class="basis-1/4 product-cell p-2 h-[330px]">
                    <a href="{{route('showProductDetail', $item->id)}}"
                        class="block h-[200px] w-full bg-cover bg-no-repeat bg-center"
                        style="background-image: url(<?php    echo asset($item->getFirstImageUrl()->url) ?>);"></a>
                    <a href="{{route('showProductDetail', $item->id)}}" class="overflow-hidden">{{$item->name}}</a>
                    <p>{{$item->formatedPrice()}}</p>
                    <div class="product-actions flex-row hidden justify-center mt-3 gap-4">
                        @if ($item->quantity > 0)
                            <button
                                class="btn-add-cart basis-1/2 py-2 block uppercase text-center text-[#0A0A0B] border-[1px] border-[#0A0A0B]"
                                data-id="{{$item->id}}" data-price="{{$item->price}}" data-name="{{$item->name}}"
                                data-imageUrl="{{$item->getFirstImageUrl()->url}}" data-size="{{$item->size}}">Thêm
                                vào
                                giỏ</button>
                        @endif
                        <a href="{{route('showProductDetail', $item->id)}}"
                            class="basis-1/2 py-2 block uppercase text-center text-white bg-[#0A0A0B] ">Xem thêm</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="max-w-screen-xl mx-auto mt-8 new-product-section">
        <div class="title flex flex-col lg:flex-row items-center">
            <h1 class="uppercase text-xl">Sản phẩm khác</h1>
            <a href="" class="ml-4">Xem tất cả <i class="fa-solid fa-chevron-right"></i></a>
        </div>
        <hr>
        <div class="content flex flex-col flex-wrap lg:flex-row mt-5">
            @foreach ($products as $item)
                <div class="basis-1/4 product-cell p-2 h-[330px]">
                    <a href="{{route('showProductDetail', $item->id)}}"
                        class="block h-[200px] w-full bg-cover bg-no-repeat bg-center"
                        style="background-image: url(<?php    echo asset($item->getFirstImageUrl()->url) ?>);"></a>
                    <a href="{{route('showProductDetail', $item->id)}}" class="overflow-hidden">{{$item->name}}</a>
                    <p>{{$item->formatedPrice()}}</p>
                    <div class="product-actions flex-row hidden justify-center mt-3 gap-4">
                        @if ($item->quantity > 0)
                            <button
                                class="btn-add-cart basis-1/2 py-2 block uppercase text-center text-[#0A0A0B] border-[1px] border-[#0A0A0B]"
                                data-id="{{$item->id}}" data-price="{{$item->price}}" data-name="{{$item->name}}"
                                data-imageUrl="{{$item->getFirstImageUrl()->url}}" data-size="{{$item->size}}">Thêm
                                vào
                                giỏ</button>
                        @endif
                        <a href="{{route('showProductDetail', $item->id)}}"
                            class="basis-1/2 py-2 block uppercase text-center text-white bg-[#0A0A0B] ">Xem thêm</a>
                    </div>
                </div>

            @endforeach
            <div class="w-full">{{$products->links()}}</div>
        </div>
    </div>
</main>
@endsection
@section('scripts')
@if (auth()->check())

@else
    <script type="module" src="{{asset('client/assets/base/JS/handlerCartForGuestUser.js')}}"></script>
@endif
@endsection