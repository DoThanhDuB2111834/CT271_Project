@extends('client.layouts.app')
@section('slider')
<div class="slider relative w-full h-[500px] bg-cover bg-no-repeat bg-center mt-4"
    style="background-image: url(<?php echo asset('Image/slider/banner-trang-danh-muc-sofa.jpg')?>);">
    <div class="bg-black opacity-20 h-full"></div>
    <div
        class="absolute bottom-1/4 left-1/2 -translate-x-1/4 lg:translate-x-0 lg:left-[10%] font-semibold text-5xl text-white">
        Sản phẩm
    </div>
</div>
@endsection
@section('content')
<main>
    <div class=" max-w-screen-xl mx-auto mt-8 product-section">

        <div class="content flex flex-col flex-wrap lg:flex-row mt-5">
            @foreach ($products as $item)
                <div class="basis-1/4 product-cell p-2 h-[360px]">
                    <a href="{{route('showProductDetail', $item->id)}}"
                        class="block relative h-[200px] w-full bg-cover bg-no-repeat bg-center"
                        style="background-image: url(<?php    echo asset($item->getFirstImageUrl()->url) ?>);">
                        @if ($item->getDiscountAmouts() > 0)
                            <div class="discount-label absolute right-0 inline-block p-1 bg-red-600 text-white">
                                {{ '-' . $item->getDiscountAmouts() . '%'}}
                            </div>
                        @endif
                    </a>
                    <a href="{{route('showProductDetail', $item->id)}}" class="overflow-hidden">{{$item->name}}</a>
                    @if($item->getDiscountAmouts() > 0)
                        <p class="text-red-500">
                            {{ number_format($item->price * ((100 - $item->getDiscountAmouts()) / 100), 0, ',', '.') . '₫'}}
                        </p>
                    @endif
                    <p class="@if ($item->getDiscountAmouts() > 0)
                        text-[#939597] line-through
                    @endif">{{$item->formatedPrice()}}</p>
                    <div class="product-actions flex-row lg:hidden justify-center mt-3 gap-4">
                        @if ($item->quantity > 0)
                            <a class="btn-add-cart cursor-pointer basis-1/2 py-2 block uppercase text-center text-[#0A0A0B] border-[1px] border-[#0A0A0B]"
                                data-id="{{$item->id}}"
                                data-price="{{$item->price * ((100 - $item->getDiscountAmouts()) / 100)}}"
                                data-name="{{$item->name}}" data-imageUrl="{{$item->getFirstImageUrl()->url}}"
                                data-size="{{$item->size}}">Thêm
                                vào
                                giỏ</a>
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