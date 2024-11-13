<section>
    <h1 class="text-[#0A0A0B] text-2xl font-semibold mt-16">Thay đổi mật khẩu</h1>
    @if (session('status') == 'password-updated')
        <p class="text-green-500 text-base">{{session('status')}}</p>
    @endif
    <form action="{{ route('password.update') }}" method="post">
        @csrf
        @method('put')
        <div class="flex flex-col lg:flex-row flex-wrap">
            <div class="form-control w-full pr-6 flex flex-col mt-8">
                <label for="current_password" class="text-sm mb-2">Mật khẩu hiện tại *</label>
                <input type="password" id="current_password"
                    class="outline-none p-2 border-[#eaeaead9] border-[1px] shadow-sm shadow-gray-400"
                    name="current_password" value="">
                <span class="text-red-400"> {{ $errors->updatePassword->first('current_password') ?? '' }}</span>
            </div>
            <div class="form-control w-full pr-6 flex flex-col mt-8">
                <label for="password" class="text-sm mb-2">Mật khẩu mới *</label>
                <input type="password" id="password"
                    class="outline-none p-2 border-[#eaeaead9] border-[1px] shadow-sm shadow-gray-400" name="password"
                    value="">
                <span class="text-red-400"> {{ $errors->updatePassword->first('password') ?? '' }}</span>
            </div>
            <div class="form-control w-full pr-6 flex flex-col mt-8">
                <label for="password_confirmation" class="text-sm mb-2">Nhập lại Mật khẩu mới *</label>
                <input type="password" id="password_confirmation"
                    class="outline-none p-2 border-[#eaeaead9] border-[1px] shadow-sm shadow-gray-400"
                    name="password_confirmation">
                <span class="text-red-400"> {{ $errors->updatePassword->first('password_confirmation') ?? '' }}</span>
            </div>
            <button type="submit"
                class="uppercase mt-4 bg-[#0a0a0b] text-white text-base text-center font-medium px-4 py-2">Thay đổi mật
                khẩu</button>
        </div>
    </form>
</section>