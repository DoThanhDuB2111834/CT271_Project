<div id="auth-modal-blurring"
    class="@if ($errors->signup->first('email') || $errors->signup->first('password') || $errors->login->first('email') || $errors->first('email') || session('type') == 'auth') test @else hidden @enderror fixed w-full h-full z-40 left-0 top-0 bg-black opacity-40">

</div>
<div id="auth-modal-view"
    class="@if ($errors->signup->first('email') || $errors->signup->first('password') || $errors->login->first('email') || $errors->first('email') || session('type') == 'auth') flex @else hidden @enderror fixed z-50 w-[90%] lg:w-[60%] h-full lg:h-[60%] top-[5%] lg:top-[20%] left-[5%] lg:left-[20%] bg-white flex-col gap-8 lg:flex-row px-8 py-6 overflow-auto transition-all duration-300">
    <div id="auth-modal-signin" class="basis-1/2 pr-8 border-b-[1px] border-b-[#eaeaead9] lg:border-r-[1px] lg:border-r-[#eaeaead9] border-solid">
   
    <h1 class="uppercase text-2xl font-semibold text-[#0A0A0B] mb-4">Đăng nhập</h1>
        <form action="{{route('login.store')}}" method="post">
            @csrf
            <div class="form-control flex flex-col mb-8">
            <label for="email-signin" class="text-[#0A0A0B] font-medium mb-2">Tên đăng nhập hoặc địa chỉ email *</label>
            <input type="email" id="email-signin"
                class="outline-none p-2 border-[#eaeaead9] border-[1px] shadow-sm shadow-gray-400" name="email" value="{{old('email') ?? ''}}">
                <span class="text-red-400"> {{ $errors->first('email') ?? '' }}</span>
        </div>
        <div class="form-control flex flex-col mb-6">
            <label for="password-signin" class="text-[#0A0A0B] font-medium mb-2">Mật khẩu *</label>
            <input type="password" id="password-signin"
                class="outline-none p-2 border-[#eaeaead9] border-[1px] shadow-sm shadow-gray-400" name="password">
                <span class="text-red-400"> {{ $errors->login->first('password') ?? '' }}</span>
        </div>
        <div class="form-control mb-4">
            <input type="checkbox" id="remember" class="" name="remember">
            <label for="remember" class="text-[#0A0A0B] font-medium mb-2">Lưu thông tin đăng nhập</label>
        </div>
        <button type="submit" class="uppercase bg-[#0a0a0b] text-white text-base text-center font-medium px-4 py-2">Đăng
            nhập</button>
        </form>
        <a href="{{route('password.request')}}" class="text-[#0a0a0b] block mt-2 text-lg">Quên mật khẩu?</a>
    </div>
    <div id="auth-modal-signup" class="basis-1/2">
        <h1 class="uppercase text-2xl font-semibold text-[#0A0A0B] mb-4">Đăng nhập</h1>
        <form action="{{route('register.store')}}" method="post">
            @csrf
            <div class="form-control flex flex-col mb-4">
                <label for="email-signup" class="text-[#0A0A0B] font-medium mb-2">Tên đăng nhập hoặc địa chỉ email
                    *</label>
                <input type="email" id="email-signup" value="{{ $errors->signup->first('email') ? old('email') : '' }}"
                    class="outline-none p-2 border-[#eaeaead9] border-[1px] shadow-sm shadow-gray-400" name="email">
                    <span class="text-red-400"> {{ $errors->signup->first('email') ?? '' }}</span>
            </div>
            <div class="form-control flex flex-col mb-4">
                <label for="password-signup" class="text-[#0A0A0B] font-medium mb-2">Mật khẩu *</label>
                <input type="password" id="password-signup"
                    class="outline-none p-2 border-[#eaeaead9] border-[1px] shadow-sm shadow-gray-400" name="password">
                <span class="text-red-400"> {{ $errors->signup->first('password') ?? '' }}</span>
               
            </div>
            <div class="form-control flex flex-col mb-4">
                <label for="password_confirmation" class="text-[#0A0A0B] font-medium mb-2">Mật khẩu *</label>
                <input type="password" id="password_confirmation"
                    class="outline-none p-2 border-[#eaeaead9] border-[1px] shadow-sm shadow-gray-400"
                    name="password_confirmation">
                <span class="text-red-400"> {{ $errors->signup->first('password_confirmation') ?? '' }}</span>
            </div>
            <button type="submit"
                class="uppercase bg-[#0a0a0b] text-white text-base text-center font-medium px-4 py-2">Đăng
                ký</button>
        </form>
    </div>
    <button class="toogle-auth-modal absolute right-[10px] top-0 cursor-pointer">
        <i class="fa-solid fa-xmark"></i>
    </button>
</div>