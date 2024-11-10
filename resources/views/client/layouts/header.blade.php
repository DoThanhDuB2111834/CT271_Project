<header class="flex justify-between mx-auto px-32 py-4">
    <div class="uppercase text-[#666666d9]">
        Chào mừng bạn đến với hệ thống siêu thị nội thất 360!
    </div>
    <div class="header-nav hidden lg:flex items-center text-[#666666d9] text-sm">
        <button class="toogle-cart-button relative"><i class="fa-solid fa-cart-shopping "></i><span id=""
                class="cart-amount-label absolute top-[-1px] right-[-6px] px-1 bg-red-500 leading-[14px] text-[10px] text-white rounded-full"></span></button>
        @if (auth()->check())
            <div class="ml-4 relative account-icon">
                <a href="{{route('profile.edit')}}" class="">Tài khoản của tôi
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
</header>
<div id="cart-blurring" class=" z-40 hidden fixed left-0 top-0 bg-black opacity-40 w-[100vw] h-[100%]">

</div>
<div id="cart-right-modal"
    class=" z-50 px-4 py-8 fixed top-0 h-[100%] right-0 translate-x-[100%] w-2/3 lg:w-1/4 bg-white transition-transform duration-300">
    <button class="toogle-cart-button absolute left-2 top-2">
        <i class="fa-solid fa-xmark"></i>

    </button>
    <h1 class="uppercase text-xl text-[#0a0a0b] text-center font-semibold w-full">Cart</h1>
    <div class="divider mx-auto"></div>
    <div class="cart-right-modal-body h-[70%] overflow-auto">


    </div>
    <div class="cart-right-modal-footer h-[30%]">
        <hr>
        <div class="flex flex-row justify-between mt-2">
            <p>Thành tiền:</p>
            <p id="cart-right-modal-footer-total-price">0d</p>
        </div>
        <a href="{{route('cart.index')}}"
            class="block mt-4 p-2 uppercase bg-[#0a0a0b] text-white text-lg text-center font-semibold">Xem giỏ
            hàng</a>
        @if (Auth::check())
            <a href="{{route('cart-checkout.index')}}"
                class="block mt-4 p-2 uppercase border-[1px] border-[#0a0a0b] text-[#0a0a0b] text-lg text-center font-semibold">Check
                out</a>
        @endif
    </div>
</div>