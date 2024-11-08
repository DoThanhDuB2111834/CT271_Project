@use('Illuminate\Support\Collection')
@use('App\Models\category')
@php
    function printListCategory($categories, $indent, Collection $isPrintedCategories)
    {
        if ($indent > 0)
            echo "<ul class=\"hidden w-full mt-3 transition-all duration-300\">";
        else
            echo "<ul class=\"w-full\">";

        foreach ($categories as $category) {
            echo ("<li class=\"mb-3 flex justify-between flex-wrap " . "\"><a " . ($indent > 0 ? "href=\"" . route('showCategoryDetail', $category->name) . "\"" : "") . " class=\"basis-3/4 " . ($indent == 0 ? "text-xl" : "") . "\">" . str_repeat("&ensp;", $indent) . "$category->name</a>");
            if ($indent == 0)
                echo "<button class=\"expand-categories-child basis-1/4 text-center cursor-pointer text-[#666666d9]\"><i class=\"fa-solid fa-chevron-down\"></i> </button> ";
            $isPrintedCategories->push($category);
            if ($category->children()->count() > 0) {
                printListCategory($category->children()->get(), $indent + 2, $isPrintedCategories);
            }
            if ($indent == 0) {
                echo "</hr>";
            }
            echo "</li>";

        }
        echo "</ul>";
    }

    function printTest($categories)
    {
        echo "<ul class=\"lg:hidden w-full mt-3 transition-all duration-300\">";
        foreach ($categories as $item) {
            $isSelected = in_array($item->id, old('categories') ?? []);
            echo "<li class=\"mb-3 flex justify-between flex-wrap " . "\"><a " . "href=\"" . route('showCategoryDetail', $item->name) . "\"" . " class=\"basis-3/4 text-xl\">" . "$item->name</a>";
        }
        echo "</ul>";
    }
@endphp
<div class="max-w-screen-xl w-full mx-auto flex flex-row mt-3">
    <label for="toogle-product-categories"
        class="cartegories-bar mr-3 basis-1/12 lg:basis-1/12 text-3xl flex justify-center lg:justify-start text-[#666666d9] cursor-pointer items-center">
        <i class="fa-solid fa-bars"></i></label>
    <input type="checkbox" id="toogle-product-categories" class="hidden">
    <div class="product-categories-blurring z-40 hidden fixed left-0 top-0 bg-black opacity-40 w-[100%] h-[100%]">

    </div>
    <div
        class="product-categories z-50 px-4 py-8 fixed top-0 h-[100%] left-[-66.666667%] w-2/3 lg:left-[-25%] lg:w-1/4 bg-white transition-transform duration-300">
        <ul class="lg:hidden w-full mt-3 transition-all duration-300">
            <li class="mb-3 flex justify-between flex-wrap">
                <a href="{{route('index')}}" class="basis-3/4 text-xl">
                    Trang chủ
                </a>
            </li>
            <li class="mb-3 flex justify-between flex-wrap">
                <a href="{{route('productClient.index')}}" class="basis-3/4 text-xl">
                    Sản phẩm
                </a>
            </li>
            <li class="mb-3 flex justify-between flex-wrap">
                <a href="{{route('showDiscountProduct')}}" class="basis-3/4 text-xl">
                    Hàng khuyến mãi
                </a>
            </li>
        </ul>
        @php
            $isPrintedCategories = collect([]);
            printListCategory($highestCategories, 0, $isPrintedCategories);
            $allCategories = category::all();
            $isNotPrintedCategories = $allCategories->diff($isPrintedCategories);
            printTest($isNotPrintedCategories);
        @endphp
        <label for="toogle-product-categories" class="absolute right-[10px] top-0 cursor-pointer">
            <i class="fa-solid fa-xmark"></i>
        </label>
    </div>
    <nav class="uppercase hidden basis-0/12 lg:basis-9/12 lg:flex lg:justify-start items-center">
        <a href="{{route('index')}}"
            class="mr-3  {{request()->url() == route('index') ? 'active' : ''}} hover:lg:transition-all hover:lg:text-[#dd9933] hover:lg:duration-300">
            <!-- <img src="{{asset('website_logo_client.png')}}" alt="navbar brand"
                class="navbar-brand w-[120px] h-[40px]" /> -->
            <div class="w-[120px] h-[50px]"
                style="background-image: url(<?php echo asset('website_logo_client.png') ?>); background-repeat: no-repeat; background-position: center; background-size: cover;">
            </div>
        </a>
        <a href="{{route('productClient.index')}}"
            class="mr-3 mt-3 {{request()->url() == route('productClient.index') ? 'active' : ''}} hover:lg:transition-all hover:lg:text-[#dd9933] hover:lg:duration-300">Sản
            phẩm</a>
        <div
            class="mr-3 mt-3 relative room-toogle cursor-pointer hover:lg:transition-all hover:lg:text-[#dd9933] hover:lg:duration-300">
            <span
                class="{{strpos(request()->url(), 'http://127.0.0.1:8000/Shop/Ph%C3%B2ng') !== false ? 'active' : ''}}">Phòng</span>
            <span class="text-[10px]"><i class="fa-solid fa-chevron-down"></i></span>
            <div class="room-categories absolute hidden z-10 bg-white w-[200px] px-5 py-5 border-[#666666d9]">
                <ul>
                    <li
                        class="py-2 text-[#666666d9] border-b-[#666666d9] border-b-[1px] hover:lg:transition-all hover:lg:text-black hover:lg:duration-300 ">
                        <a href="{{route('showCategoryDetail', 'Phòng khách')}}">Phòng khách</a>
                    </li>
                    <li
                        class="py-2 text-[#666666d9] border-b-[#666666d9] border-b-[1px] hover:lg:transition-all hover:lg:text-black hover:lg:duration-300">
                        <a href="{{route('showCategoryDetail', 'Phòng Ăn')}}">Phòng ăn</a>
                    </li>
                    <li
                        class="py-2 text-[#666666d9] border-b-[#666666d9] border-b-[1px] hover:lg:transition-all hover:lg:text-black hover:lg:duration-300">
                        <a href="{{route('showCategoryDetail', 'Phòng ngủ')}}">Phòng ngủ</a>
                    </li>
                    <li
                        class="py-2 text-[#666666d9] border-b-[#666666d9] hover:lg:transition-all hover:lg:text-black hover:lg:duration-300">
                        <a href="{{route('showCategoryDetail', 'Phòng làm việc')}}">Phòng làm việc</a>
                    </li>
                </ul>
            </div>
        </div>
        <a href="{{route('showDiscountProduct')}}"
            class="mr-3 mt-3 {{request()->url() == route('showDiscountProduct') ? 'active' : ''}} hover:lg:transition-all hover:lg:text-[#dd9933] hover:lg:duration-300">Hàng
            khuyến mãi</a>
    </nav>

    <div
        class="relative searchBar basis-8/12 lg:basis-3/12 px-5 py-1 border border-solid border-[#666666d9] rounded-full flex flex-row items-center">
        <input type="text" id="topbar-search" placeholder="Tìm kiếm sản phẩm" class="w-11/12 outline-none">
        <button>
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
        <ul id="topbar-search-result" class="">
            <!-- <li class="flex flex-row p-3">
                <div class="topbar-search-result-image basis-1/4 bg-no-repeat bg-cover bg-center h-[50px]"
                    style="background-image: url('Image/product/1000-ghe-roma-768x511.jpg');"></div>
                <div class="topbar-search-result-name text-center">
                    Bộ bàn ghế roma
                </div>
                <div class="topbar-search-result-price">
                    10000000d
                </div>

            </li>
            <hr class="my-3"> -->
        </ul>
    </div>

    <div class="basis-2/12 lg:basis-0/12 flex lg:hidden justify-center items-center text-[#666666d9] text-sm">
        <button class="toogle-cart-button cursor-pointer relative"><i class="fa-solid fa-cart-shopping"></i><span id=""
                class="cart-amount-label absolute top-[-1px] right-[-6px] px-1 bg-red-500 leading-[14px] text-[10px] text-white rounded-full"></span></button>
        @if (auth()->check())
            <div class="ml-4 relative account-icon">
                <a href="{{route('profile.edit')}}" class="">
                    <i class="fa-solid fa-user"></i>
                </a>
                <div class="account-action-list z-10 w-[180px] absolute p-5 bg-white text-lg transition-all duration-300">
                    <ul>
                        <li
                            class="border-b-[1px] border-[#c1c1c1d9] pb-3 hover:text-[#0A0A0B] transition-colors duration-300">
                            <a href="{{route('profile.edit')}}">Thông tin của tôi</a>
                        </li>
                        <li
                            class="border-b-[1px] border-[#c1c1c1d9] py-3 hover:text-[#0A0A0B] transition-colors duration-300">
                            <a href="">Đơn hàng</a>
                        </li>
                        <li class="pt-3 hover:text-[#0A0A0B] transition-colors duration-300">
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button type="submit">Đăng xuất</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        @else
            <button class="ml-4 cursor-pointer toogle-auth-modal">Đăng nhập <i class="fa-solid fa-user"></i></button>
        @endif
    </div>
</div>