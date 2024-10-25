<div class="max-w-screen-xl w-full mx-auto flex flex-row mt-3">
    <label for="toogle-product-categories"
        class="cartegories-bar mr-3 basis-1/12 lg:basis-1/12 text-3xl flex justify-center lg:justify-start text-[#666666d9] cursor-pointer">
        <i class="fa-solid fa-bars"></i></label>
    <input type="checkbox" id="toogle-product-categories" class="hidden">
    <div class="product-categories-blurring z-40 hidden fixed left-0 top-0 bg-black opacity-40 w-[100vw] h-[100vh]">

    </div>
    <div
        class="product-categories z-50 fixed top-0 h-[100vh] left-[-66.666667%] w-2/3 lg:left-[-25%] lg:w-1/4 bg-white transition-transform duration-300">

        <label for="toogle-product-categories" class="absolute right-[10px] top-0 cursor-pointer">
            <i class="fa-solid fa-xmark"></i>
        </label>
    </div>
    <nav class="uppercase hidden basis-0/12 lg:basis-9/12 lg:flex lg:justify-start items-center">
        <a href="" class="mr-3 hover:lg:transition-all hover:lg:text-[#dd9933] hover:lg:duration-300">Trang
            chủ</a>
        <a href="" class="mr-3 hover:lg:transition-all hover:lg:text-[#dd9933] hover:lg:duration-300">Sản
            phẩm</a>
        <div
            class="mr-3 relative room-toogle cursor-pointer hover:lg:transition-all hover:lg:text-[#dd9933] hover:lg:duration-300">
            phòng <span class="text-[10px]"><i class="fa-solid fa-chevron-down"></i></span>
            <div class="room-categories absolute hidden z-10 bg-white w-[200px] px-5 py-5 border-[#666666d9]">
                <ul>
                    <li
                        class="py-2 text-[#666666d9] border-b-[#666666d9] border-b-[1px] hover:lg:transition-all hover:lg:text-black hover:lg:duration-300 ">
                        <a href="">Phòng khách</a>
                    </li>
                    <li
                        class="py-2 text-[#666666d9] border-b-[#666666d9] border-b-[1px] hover:lg:transition-all hover:lg:text-black hover:lg:duration-300">
                        <a href="">Phòng ăn</a>
                    </li>
                    <li
                        class="py-2 text-[#666666d9] border-b-[#666666d9] border-b-[1px] hover:lg:transition-all hover:lg:text-black hover:lg:duration-300">
                        <a href="">Phòng ngủ</a>
                    </li>
                    <li
                        class="py-2 text-[#666666d9] border-b-[#666666d9] hover:lg:transition-all hover:lg:text-black hover:lg:duration-300">
                        <a href="">Phòng làm việc</a>
                    </li>
                </ul>
            </div>
        </div>
        <a href="" class="mr-3 hover:lg:transition-all hover:lg:text-[#dd9933] hover:lg:duration-300">Hàng mới
            về</a>
        <a href="" class="mr-3 hover:lg:transition-all hover:lg:text-[#dd9933] hover:lg:duration-300">Hàng
            khuyến mãi</a>
    </nav>

    <div class="searchBar basis-8/12 lg:basis-3/12 px-5 py-1 border border-solid border-[#666666d9] rounded-full">
        <input type="text" placeholder="Tìm kiếm sản phẩm" class="w-11/12 outline-none">
        <button>
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </div>

    <div class="basis-2/12 lg:basis-0/12 flex lg:hidden justify-center items-center text-[#666666d9] text-sm">
        <a class="cursor-pointer"><i class="fa-solid fa-cart-shopping"></i></a>
        <a class="ml-4 cursor-pointer"><i class="fa-solid fa-user"></i></a>
    </div>
</div>
<!-- <div class="slider w-full h-[500px] bg-cover bg-no-repeat bg-center mt-4"
            style="background-image: url(<?php echo asset('Image/slider/banner-trang-chu-san-pham.jpg')?>);">
            <div class="bg-black opacity-20 h-full"></div>
        </div> -->