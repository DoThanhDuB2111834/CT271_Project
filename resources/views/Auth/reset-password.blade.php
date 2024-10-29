@extends('client.layouts.app')
@section('content')
<div class="max-w-screen-xl mx-auto mt-16">
    <form action="{{route('password.store')}}" method="post">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <div class="form-control flex flex-col mt-8 mb-4">
            <label for="email-signin" class="text-[#0A0A0B] font-medium mb-2">Tên đăng nhập hoặc địa chỉ email *</label>
            <input type="email" id="email-signin"
                class="outline-none p-2 lg:w-1/2 border-[#eaeaead9] border-[1px] shadow-sm shadow-gray-400" name="email"
                value="{{old('email') ?? $request->email}}">
            <span class="text-red-400"> {{ $errors->first('email') ?? $errors->resetPassword->first('email')  }}</span>
        </div>
        <div class="form-control flex flex-col mb-4">
            <label for="password-signup" class="text-[#0A0A0B] font-medium mb-2">Mật khẩu mới *</label>
            <input type="password" id="password-signup"
                class="outline-none p-2 lg:w-1/2 border-[#eaeaead9] border-[1px] shadow-sm shadow-gray-400"
                name="password">
            <span class="text-red-400"> {{ $errors->resetPassword->first('password') ?? '' }}</span>

        </div>
        <div class="form-control flex flex-col mb-4">
            <label for="password_confirmation" class="text-[#0A0A0B] font-medium mb-2">Nhập lại Mật khẩu mới *</label>
            <input type="password" id="password_confirmation"
                class="outline-none p-2 lg:w-1/2 border-[#eaeaead9] border-[1px] shadow-sm shadow-gray-400"
                name="password_confirmation">
            <span class="text-red-400"> {{ $errors->resetPassword->first('password_confirmation') ?? '' }}</span>
        </div>
        <button type="submit"
            class="uppercase mt-4 bg-[#0a0a0b] text-white text-base text-center font-medium px-4 py-2">Khôi phục mật
            khẩu</button>
    </form>
</div>
@endsection
@section('scripts')
@if (auth()->check())

@else
    <script type="module" src="{{asset('client/assets/base/JS/handlerCartForGuestUser.js')}}"></script>

@endif
@endsection