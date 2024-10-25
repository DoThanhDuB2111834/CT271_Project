<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('Image/logoweb.png') }}" sizes="16x16" />
    <title>Nội thất 360</title>
    <link rel="stylesheet" href="{{asset('client/assets/base/homepage.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
</head>

<body>

    <div class="warpper">
        <header class="flex justify-between mx-auto px-32 py-4">
            <div class="uppercase text-[#666666d9]">
                Chào mừng bạn đến với hệ thống siêu thị nội thất 360!
            </div>
            <div class="header-nav hidden lg:flex text-[#666666d9] text-sm">
                <a class="cursor-pointer"><i class="fa-solid fa-cart-shopping"></i></a>
                <a class="ml-4 cursor-pointer">Đăng nhập <i class="fa-solid fa-user"></i></a>
            </div>
        </header>
        <hr>

        <div class="max-w-screen-xl w-full mx-auto flex flex-row mt-3">
            <label for="toogle-product-categories"
                class="cartegories-bar mr-3 basis-1/12 lg:basis-1/12 text-3xl flex justify-center lg:justify-start text-[#666666d9] cursor-pointer">
                <i class="fa-solid fa-bars"></i></label>
            <input type="checkbox" id="toogle-product-categories" class="hidden">
            <div
                class="product-categories-blurring z-40 hidden fixed left-0 top-0 bg-black opacity-40 w-[100vw] h-[100vh]">

            </div>
            <div
                class="product-categories z-50 fixed top-0 h-[100vh] left-[-66.666667%] w-2/3 lg:left-[-25%] lg:w-1/4 bg-white transition-transform duration-300">
                test
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

            <div
                class="searchBar basis-8/12 lg:basis-3/12 px-5 py-1 border border-solid border-[#666666d9] rounded-full">
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
        <div class="slider-categories flex flex-col lg:flex-row gap-4 mt-5 p-3">
            <a href=""
                class="slider lg:basis-1/2 h-[500px] bg-cover bg-no-repeat bg-center flex justify-center items-center"
                style="background-image: url(<?php echo asset('Image/slider/BST-COASTAL-SOFA-VANG-2.jpg')?>);">
                <div class="uppercase text-white text-4xl font-bold">
                    sofa
                </div>
            </a>
            <div class="lg:basis-1/2 grid grid-rows-4 grid-cols-1 lg:grid-rows-2 lg:grid-cols-2 gap-4">
                <a href="" class="slider h-[230px] bg-cover bg-no-repeat bg-center flex justify-center items-center"
                    style="background-image: url(<?php echo asset('Image/slider/nha-xinh-banner-ban-an-vuong-24423.jpg')?>);">
                    <div class="uppercase text-white text-2xl font-bold">
                        Bàn ăn
                    </div>
                </a>
                <a href="" class="slider h-[230px] bg-cover bg-no-repeat bg-center flex justify-center items-center"
                    style="background-image: url(<?php echo asset('Image/slider/giuong-ngu-pio-1.jpg')?>);">
                    <div class="uppercase text-white text-2xl font-bold">
                        Giường
                    </div>
                </a>
                <a href="" class="slider h-[230px] bg-cover bg-no-repeat bg-center flex justify-center items-center"
                    style="background-image: url(<?php echo asset('Image/slider/banner-armchair-nhaxinh-31-1-24.jpg')?>);">
                    <div class="uppercase text-white text-2xl font-bold">
                        Armchair
                    </div>
                </a>
                <a href="" class="slider h-[230px] bg-cover bg-no-repeat bg-center flex justify-center items-center"
                    style="background-image: url(<?php echo asset('Image/slider/nha-xinh-ghe-an-phong-an-749x800.jpg')?>);">
                    <div class="uppercase text-white text-2xl font-bold">
                        Ghế ăn
                    </div>
                </a>
            </div>
        </div>
        <main>
            <div class="slider-service flex flex-col lg:flex-row mt-4 bg-[#ebebeb]">
                <div class="basis-1/2 px-40 py-20">
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
                    style="background-image: url(<?php echo asset('Image/slider/nha-xinh-thiet-ke-noi-that-ecopark-16523-1200x800.jpg')?>);">
                </div>
            </div>
            <div class="max-w-screen-xl mx-auto mt-8 new-product-section">
                <div class="title flex flex-col lg:flex-row items-center">
                    <h1 class="uppercase text-xl">Sản phẩm mới</h1>
                    <a href="" class="ml-4">Xem tất cả <i class="fa-solid fa-chevron-right"></i></a>
                </div>
                <hr>
                <div class="content flex flex-col lg:flex-row mt-5">
                    <div class="basis-1/4 product-cell p-2 h-[330px]">
                        <a href="" class="block h-[200px] w-full bg-cover bg-no-repeat bg-center"
                            style="background-image: url(<?php echo asset('Image/test/armchair-may-moi-mau-xanh-300x200.jpg')?>);"></a>
                        <a>Armchair mây mới</a>
                        <p>13,900,000đ</p>
                        <div class="product-actions flex-row hidden justify-center mt-3 gap-4">
                            <a
                                class="basis-1/2 py-2 block uppercase text-center text-[#0A0A0B] border-[1px] border-[#0A0A0B]">Thêm
                                vào
                                giỏ</a>
                            <a class="basis-1/2 py-2 block uppercase text-center text-white bg-[#0A0A0B] ">Xem thêm</a>
                        </div>
                    </div>
                    <div class="basis-1/4 product-cell p-2 h-[330px]">
                        <a href="" class="block h-[200px] w-full bg-cover bg-no-repeat bg-center"
                            style="background-image: url(<?php echo asset('Image/test/armchair-may-moi-mau-xanh-300x200.jpg')?>);"></a>
                        <a>Armchair mây mới</a>
                        <p>13,900,000đ</p>
                        <div class="product-actions flex-row hidden justify-center mt-3 gap-4">
                            <a
                                class="basis-1/2 py-2 block uppercase text-center text-[#0A0A0B] border-[1px] border-[#0A0A0B]">Thêm
                                vào
                                giỏ</a>
                            <a class="basis-1/2 py-2 block uppercase text-center text-white bg-[#0A0A0B] ">Xem thêm</a>
                        </div>
                    </div>
                    <div class="basis-1/4 product-cell p-2 h-[330px]">
                        <a href="" class="block h-[200px] w-full bg-cover bg-no-repeat bg-center"
                            style="background-image: url(<?php echo asset('Image/test/armchair-may-moi-mau-xanh-300x200.jpg')?>);"></a>
                        <a>Armchair mây mới</a>
                        <p>13,900,000đ</p>
                        <div class="product-actions flex-row hidden justify-center mt-3 gap-4">
                            <a
                                class="basis-1/2 py-2 block uppercase text-center text-[#0A0A0B] border-[1px] border-[#0A0A0B]">Thêm
                                vào
                                giỏ</a>
                            <a class="basis-1/2 py-2 block uppercase text-center text-white bg-[#0A0A0B] ">Xem thêm</a>
                        </div>
                    </div>
                    <div class="basis-1/4 product-cell p-2 h-[330px]">
                        <a href="" class="block h-[200px] w-full bg-cover bg-no-repeat bg-center"
                            style="background-image: url(<?php echo asset('Image/test/armchair-may-moi-mau-xanh-300x200.jpg')?>);"></a>
                        <a>Armchair mây mới</a>
                        <p>13,900,000đ</p>
                        <div class="product-actions flex-row hidden justify-center mt-3 gap-4">
                            <a
                                class="basis-1/2 py-2 block uppercase text-center text-[#0A0A0B] border-[1px] border-[#0A0A0B]">Thêm
                                vào
                                giỏ</a>
                            <a class="basis-1/2 py-2 block uppercase text-center text-white bg-[#0A0A0B] ">Xem thêm</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-screen-xl mx-auto mt-8 new-product-section">
                <div class="title flex flex-col lg:flex-row items-center">
                    <h1 class="uppercase text-xl">Sản phẩm khác</h1>
                    <a href="" class="ml-4">Xem tất cả <i class="fa-solid fa-chevron-right"></i></a>
                </div>
                <hr>
                <div class="content flex flex-col flex-wrap lg:flex-row mt-5">
                    <div class="basis-1/4 product-cell p-2 h-[330px]">
                        <a href="" class="block h-[200px] w-full bg-cover bg-no-repeat bg-center"
                            style="background-image: url(<?php echo asset('Image/test/armchair-may-moi-mau-xanh-300x200.jpg')?>);"></a>
                        <a>Armchair mây mới</a>
                        <p>13,900,000đ</p>
                        <div class="product-actions flex-row hidden justify-center mt-3 gap-4">
                            <a
                                class="basis-1/2 py-2 block uppercase text-center text-[#0A0A0B] border-[1px] border-[#0A0A0B]">Thêm
                                vào
                                giỏ</a>
                            <a class="basis-1/2 py-2 block uppercase text-center text-white bg-[#0A0A0B] ">Xem thêm</a>
                        </div>
                    </div>
                    <div class="basis-1/4 product-cell p-2 h-[330px]">
                        <a href="" class="block h-[200px] w-full bg-cover bg-no-repeat bg-center"
                            style="background-image: url(<?php echo asset('Image/test/armchair-may-moi-mau-xanh-300x200.jpg')?>);"></a>
                        <a>Armchair mây mới</a>
                        <p>13,900,000đ</p>
                        <div class="product-actions flex-row hidden justify-center mt-3 gap-4">
                            <a
                                class="basis-1/2 py-2 block uppercase text-center text-[#0A0A0B] border-[1px] border-[#0A0A0B]">Thêm
                                vào
                                giỏ</a>
                            <a class="basis-1/2 py-2 block uppercase text-center text-white bg-[#0A0A0B] ">Xem thêm</a>
                        </div>
                    </div>
                    <div class="basis-1/4 product-cell p-2 h-[330px]">
                        <a href="" class="block h-[200px] w-full bg-cover bg-no-repeat bg-center"
                            style="background-image: url(<?php echo asset('Image/test/armchair-may-moi-mau-xanh-300x200.jpg')?>);"></a>
                        <a>Armchair mây mới</a>
                        <p>13,900,000đ</p>
                        <div class="product-actions flex-row hidden justify-center mt-3 gap-4">
                            <a
                                class="basis-1/2 py-2 block uppercase text-center text-[#0A0A0B] border-[1px] border-[#0A0A0B]">Thêm
                                vào
                                giỏ</a>
                            <a class="basis-1/2 py-2 block uppercase text-center text-white bg-[#0A0A0B] ">Xem thêm</a>
                        </div>
                    </div>
                    <div class="basis-1/4 product-cell p-2 h-[330px]">
                        <a href="" class="block h-[200px] w-full bg-cover bg-no-repeat bg-center"
                            style="background-image: url(<?php echo asset('Image/test/armchair-may-moi-mau-xanh-300x200.jpg')?>);"></a>
                        <a>Armchair mây mới</a>
                        <p>13,900,000đ</p>
                        <div class="product-actions flex-row hidden justify-center mt-3 gap-4">
                            <a
                                class="basis-1/2 py-2 block uppercase text-center text-[#0A0A0B] border-[1px] border-[#0A0A0B]">Thêm
                                vào
                                giỏ</a>
                            <a class="basis-1/2 py-2 block uppercase text-center text-white bg-[#0A0A0B] ">Xem thêm</a>
                        </div>
                    </div>
                    <div class="basis-1/4 product-cell p-2 h-[330px]">
                        <a href="" class="block h-[200px] w-full bg-cover bg-no-repeat bg-center"
                            style="background-image: url(<?php echo asset('Image/test/armchair-may-moi-mau-xanh-300x200.jpg')?>);"></a>
                        <a>Armchair mây mới</a>
                        <p>13,900,000đ</p>
                        <div class="product-actions flex-row hidden justify-center mt-3 gap-4">
                            <a
                                class="basis-1/2 py-2 block uppercase text-center text-[#0A0A0B] border-[1px] border-[#0A0A0B]">Thêm
                                vào
                                giỏ</a>
                            <a class="basis-1/2 py-2 block uppercase text-center text-white bg-[#0A0A0B] ">Xem thêm</a>
                        </div>
                    </div>
                    <div class="basis-1/4 product-cell p-2 h-[330px]">
                        <a href="" class="block h-[200px] w-full bg-cover bg-no-repeat bg-center"
                            style="background-image: url(<?php echo asset('Image/test/armchair-may-moi-mau-xanh-300x200.jpg')?>);"></a>
                        <a>Armchair mây mới</a>
                        <p>13,900,000đ</p>
                        <div class="product-actions flex-row hidden justify-center mt-3 gap-4">
                            <a
                                class="basis-1/2 py-2 block uppercase text-center text-[#0A0A0B] border-[1px] border-[#0A0A0B]">Thêm
                                vào
                                giỏ</a>
                            <a class="basis-1/2 py-2 block uppercase text-center text-white bg-[#0A0A0B] ">Xem thêm</a>
                        </div>
                    </div>
                    <div class="basis-1/4 product-cell p-2 h-[330px]">
                        <a href="" class="block h-[200px] w-full bg-cover bg-no-repeat bg-center"
                            style="background-image: url(<?php echo asset('Image/test/armchair-may-moi-mau-xanh-300x200.jpg')?>);"></a>
                        <a>Armchair mây mới</a>
                        <p>13,900,000đ</p>
                        <div class="product-actions flex-row hidden justify-center mt-3 gap-4">
                            <a
                                class="basis-1/2 py-2 block uppercase text-center text-[#0A0A0B] border-[1px] border-[#0A0A0B]">Thêm
                                vào
                                giỏ</a>
                            <a class="basis-1/2 py-2 block uppercase text-center text-white bg-[#0A0A0B] ">Xem thêm</a>
                        </div>
                    </div>
                    <div class="basis-1/4 product-cell p-2 h-[330px]">
                        <a href="" class="block h-[200px] w-full bg-cover bg-no-repeat bg-center"
                            style="background-image: url(<?php echo asset('Image/test/armchair-may-moi-mau-xanh-300x200.jpg')?>);"></a>
                        <a>Armchair mây mới</a>
                        <p>13,900,000đ</p>
                        <div class="product-actions flex-row hidden justify-center mt-3 gap-4">
                            <a
                                class="basis-1/2 py-2 block uppercase text-center text-[#0A0A0B] border-[1px] border-[#0A0A0B]">Thêm
                                vào
                                giỏ</a>
                            <a class="basis-1/2 py-2 block uppercase text-center text-white bg-[#0A0A0B] ">Xem thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="bg-[#303036] mt-5">
            <div class="max-w-screen-xl w-full mx-auto flex flex-col lg:flex-row text-white">
                <div class="lg:basis-1/4 py-4 px-8">
                    <h1 class="uppercase">Nội thất 360</h1>
                    <div class="divider"></div>
                    <p>Nơi Mang Đến Sự Tiện Nghi và Phong Cách, Kiến Tạo Không Gian Sống Tinh Tế Từng Chi Tiết</p>
                </div>
                <div class="lg:basis-1/4 py-4 px-8">
                    <h1 class="uppercase">Danh mục</h1>
                    <div class="divider"></div>
                    <ul>
                        <li><a href="">Trang chủ</a></li>
                        <li><a href="">Sản phẩm</a></li>
                        <li><a href="">Sản phẩm khuyến mãi</a></li>
                        <li><a href="">Sản phẩm mới về</a></li>
                    </ul>
                </div>
                <div class="lg:basis-1/4 py-4 px-8">
                    <h1 class="uppercase">Theo dõi nội thất 360</h1>
                    <div class="divider"></div>
                    <ul>
                        <li><a href=""><i class="fa-brands fa-facebook"></i>Facebook</a></li>
                        <li><a href=""><i class="fa-brands fa-youtube"></i>Youtube</a></li>
                        <li><a href=""><i class="fa-brands fa-instagram"></i>Instagram</a></li>
                    </ul>
                </div>
                <div class="lg:basis-1/4 py-4 px-8 lg:px-0">
                    <h1 class="uppercase">Kết nối với chúng tôi</h1>
                    <div class="divider"></div>
                    <p class="mb-4">Email: Hãy để lại email của bạn để nhận được những ý tưởng trang trí mới và những
                        thông tin, ưu đãi từ
                        nội thất 360</p>
                    <p class="mb-4">noithat360@gmail.com</p>
                    <div class="w-full">
                        <input type="email" placeholder="Hãy nhập vào email của bạn"
                            class="outline-none bg-[#6e6e73] w-[200px] h-[40px] rounded-l">
                        <button class="bg-[#0A0A0B] h-[40px] w-[70px] ml-[-3px] p-1 rounded-r">Đăng ký</button>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>