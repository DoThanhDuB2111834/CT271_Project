@extends('client.layouts.app')
@section('slider')
<div class="slider w-full h-[500px] bg-cover bg-no-repeat bg-center mt-4"
    style="background-image: url(<?php echo asset($category->urlImageSlider)?>);">
    <div class="bg-black opacity-20 h-full"></div>
</div>
@endsection
@section('content')
<main>
    <div class="max-w-screen-xl mx-auto mt-8 product-section">

        <div class="content flex flex-col flex-wrap lg:flex-row mt-5">
            @foreach ($products as $item)
                <div class="basis-1/4 product-cell p-2 h-[330px]">
                    <a href="" class="block h-[200px] w-full bg-cover bg-no-repeat bg-center"
                        style="background-image: url(<?php    echo asset($item->getFirstImageUrl()->url) ?>);"></a>
                    <a>{{$item->name}}</a>
                    <p>{{$item->formatedPrice()}}</p>
                    <div class="product-actions flex-row hidden justify-center mt-3 gap-4">
                        <a class="basis-1/2 py-2 block uppercase text-center text-[#0A0A0B] border-[1px] border-[#0A0A0B]">Thêm
                            vào
                            giỏ</a>
                        <a class="basis-1/2 py-2 block uppercase text-center text-white bg-[#0A0A0B] ">Xem thêm</a>
                    </div>
                </div>

            @endforeach
            <div class="w-full">{{$products->links()}}</div>
        </div>
    </div>
</main>
@endsection