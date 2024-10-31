@extends('client.layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('client/assets/base/CSS/ProductDetailPage.css')}}">
@endsection
@section('content')
<main>
    <div class="max-w-screen-xl mx-auto mt-12 flex flex-row">
        <div class="product-images basis-1/2 lg:basis-7/12">
            <div class="carousel">
                <div class="carousel-inner">
                    @foreach ($product->Images as $item)
                        <div class="carousel-item flex justify-center">
                            <img src="<?php    echo asset($item->url) ?>" alt="Slide {{$loop->index}}">
                        </div>
                    @endforeach
                </div>
                <div class="carousel-controls">
                    <button class="carousel-control-prev" onclick="prevSlide()">&#10094;</button>
                    <button class="carousel-control-next" onclick="nextSlide()">&#10095;</button>
                </div>
            </div>
            <div class="thumbnails">
                <span class="thumbnail-controls" onclick="scrollThumbnails(-1)">&#10094;</span>
                @foreach ($product->Images as $item)
                    <div class="thumbnail" onclick="showSlide(<?php    echo $loop->index ?>)"><img
                            src="<?php    echo asset($item->url) ?>" alt="Thumbnail {{$loop->index}}"></div>
                @endforeach
                <span class="thumbnail-controls" onclick="scrollThumbnails(1)">&#10095;</span>
            </div>
        </div>
        <div class="product-detail basis-1/2 lg:basis-5/12">
            <h1 class="text-3xl text-[#0a0a0b] font-bold">{{$product->name}}</h1>
            <div class="divider"></div>
            <p class="flex items-center mb-3"><span class="text-xl font-semibold text-[#0a0a0b]">Mã&ensp;&ensp;</span>
                {{$product->id}}
            </p>
            <p class="flex items-center mb-3"><span
                    class="text-xl font-semibold text-[#0a0a0b]">Giá&ensp;&ensp;</span>@if($product->getDiscountAmouts() > 0)
                        <span class="text-red-500">
                            {{ number_format($product->price * ((100 - $product->getDiscountAmouts()) / 100), 0, ',', '.') . '₫'}}</span>
                    @endif
                <span class="@if ($product->getDiscountAmouts() > 0)
                    text-[#939597] underline text-xs ml-2
                @endif">{{$product->formatedPrice()}}</span>
            </p>
            <p class="flex items-center mb-3"><span class="text-xl font-semibold text-[#0a0a0b]">Kích
                    thước&ensp;&ensp;</span>{{$product->size}}
            </p>
            <p class="flex items-center mb-3">
                <span class="text-xl font-semibold text-[#0a0a0b]">Danh mục&ensp;&ensp;</span>
                @foreach ($product->categories()->pluck('category.name')->toArray() as $item)
                    {{$item . ($loop->index < count($product->categories) - 1 ? ',' : '.')}}
                @endforeach
            </p>

            <div class="mt-8 flex flex-col lg:flex-row">
                @if ($product->quantity > 0)
                    <div class="quantity-control">
                        <button class="btn-decrease" data-id="{{$product->id}}">-</button>
                        <input type="number" id="quantityOfProduct{{$product->id}}" value="1" min="1">
                        <button class="btn-increase" data-id="{{$product->id}}">+</button>
                    </div>
                    <a href=""
                        class="uppercase block bg-[#0a0a0b] text-white text-lg text-center font-medium px-4 py-2 my-4 lg:my-0 lg:mx-4">Mua
                        ngay</a>
                    <button
                        class="btn-add-cart uppercase bg-white border-[#7d7d7d] border-[1px] px-4 py-2 text-lg text-[#7d7d7d]"
                        data-id="{{$product->id}}"
                        data-price="{{$product->price * ((100 - $product->getDiscountAmouts()) / 100)}}"
                        data-name="{{$product->name}}" data-imageUrl="{{$product->getFirstImageUrl()->url}}"
                        data-size="{{$product->size}}">Thêm
                        vào giỏ</button>
                @else
                    <p class="text-[#0a0a0b] text-lg font-semibold">Không có sẵn</p>
                @endif
            </div>

            <div class="mt-12">
                <div class="tabs flex flex-col lg:flex-row">
                    @if ($product->description != '')
                        <div class="tab text-[#7d7d7d] mr-3 text-lg font-medium  active-tab"
                            onclick="showTabContent(event, 'tab1')">Mô tả</div>
                    @endif
                    <div class="tab text-[#7d7d7d] mr-3 text-lg font-medium " onclick="showTabContent(event, 'tab2')">
                        Bảo
                        hành
                    </div>
                    <div class="tab text-[#7d7d7d] mr-3 text-lg font-medium " onclick="showTabContent(event, 'tab3')">
                        Vận
                        chuyển
                    </div>
                </div>

                @if ($product->description != '')
                    <div id="tab1" class="tab-content mt-3 show">
                        <p>{{$product->description}}</p>
                    </div>
                @endif
                <div id="tab2" class="tab-content mt-3">
                    <ul>
                        <li class="mb-3">&ensp;&ensp;&ensp;&ensp;&ensp;Các sản phẩm nội thất tại nội thất 360 đa số đều
                            được
                            sản xuất tại
                            nhà máy của công
                            ty cổ
                            phần
                            xây dựng kiến trúc AA với đội
                            ngũ nhân viên và công nhân ưu tú cùng cơ sở vật chất hiện đại
                            (http://www.aacorporation.com/). nội thất 360 đã kiểm tra kỹ
                            lưỡng từ nguồn nguyên liệu cho đến sản phẩm hoàn thiện cuối cùng.</li>
                        <li class="mb-3">&ensp;&ensp;&ensp;&ensp;&ensp;Nhà Xinh bảo hành một năm cho các trường hợp có
                            lỗi về kỹ
                            thuật trong quá trình
                            sản
                            xuất hay
                            lắp đặt.</li>
                        <li class="mb-3">&ensp;&ensp;&ensp;&ensp;&ensp;Quý khách không nên tự sửa chữa mà hãy báo ngay
                            cho nội thất 360
                            qua hotline: 1800
                            7200.
                        </li>
                        <li class="mb-3">&ensp;&ensp;&ensp;&ensp;&ensp;Sau thời gian hết hạn bảo hành, nếu quý khách có
                            bất kỳ yêu
                            cầu hay thắc mắc thì
                            vui
                            lòng
                            liên hệ với nội thất 360 để được
                            hướng dẫn và giải quyết các vấn đề gặp phải.</li>
                    </ul>
                </div>

                <div id="tab3" class="tab-content mt-3">
                    <h1 class="uppercase mb-4 text-[#0a0a0b]">Giao hàng tận nơi</h1>
                    <p class="mb-4">Nội thất 360 cung cấp dịch vụ giao hàng tận nơi, lắp ráp và sắp xếp vị trí theo đúng
                        ý muốn của quý
                        khách:</p>
                    <p class="mb-4">- MIỄN PHÍ giao hàng trong các Quận nội thành Tp.Hồ Chí Minh và Hà Nội, áp dụng cho
                        các đơn hàng
                        trị giá trên 10 triệu.</p>
                    <p class="">- Đối với khu vực các tỉnh lân cận: Tính phí hợp lý theo dựa trên quãng đường vận chuyển
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-screen-xl mx-auto mt-24">
        <h1 class="text-[#0a0a0b] w-full text-4xl text-center font-semibold">Có thể bạn cũng thích</h1>

        <div class="content flex flex-col flex-wrap lg:flex-row mt-5">
            @foreach ($recommendedProducts as $item)
                <div class="basis-1/4 product-cell p-2 h-[330px]">
                    <a href="{{route('showProductDetail', $item->id)}}"
                        class="block h-[200px] w-full bg-cover bg-no-repeat bg-center "
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
</main>
@endsection
@section('scripts')

<script>

    let currentIndex = 0;

    function showSlide(index) {
        const slides = document.querySelectorAll('.carousel-item');
        const thumbnails = document.querySelectorAll('.thumbnail');
        const totalSlides = slides.length;

        if (index >= totalSlides) {
            currentIndex = 0;
        } else if (index < 0) {
            currentIndex = totalSlides - 1;
        } else {
            currentIndex = index;
        }

        const offset = -currentIndex * 100;
        document.querySelector('.carousel-inner').style.transform = `translateX(${offset}%)`;

        thumbnails.forEach(thumbnail => thumbnail.classList.remove('active'));
        thumbnails[currentIndex].classList.add('active');
    }

    function nextSlide() {
        showSlide(currentIndex + 1);
    }

    function prevSlide() {
        showSlide(currentIndex - 1);
    }

    function scrollThumbnails(direction) {
        const container = document.querySelector('.thumbnails');
        container.scrollLeft += direction * 60;
        showSlide(currentIndex + direction);
    }

    // Hiển thị slide đầu tiên
    showSlide(currentIndex);

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
</script>

@endsection