<div class="basis-3/12 bg-[#e6e7e9] p-3">
    <ul>
        <li class="text-[#4B4E51] mb-3 font-semibold"><a href="">Thông tin của tôi</a></li>
        <li class="text-[#4B4E51] mb-3 font-semibold"><a href="">Đơn hàng</a></li>
        <li class="text-[#4B4E51] mb-3 font-semibold">
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button type="submit">Đăng xuất</button>
            </form>
        </li>
    </ul>
</div>