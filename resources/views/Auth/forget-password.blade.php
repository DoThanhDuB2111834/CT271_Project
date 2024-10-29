@extends('client.layouts.app')
@section('content')
<div class="max-w-screen-xl mx-auto mt-16">
    <div class="title text-lg">Quên mật khẩu? Vui lòng nhập vào tên đăng nhập hoặc địa chỉ email. Bạn sẽ nhận đường dẫn
        có chứa
        mật khẩu mới thông qua
        email.</div>
    @if (session('status'))
        <p class="font-medium text-sm text-green-600">{{session('status')}}</p>
    @endif
    <form action="{{route('password.email')}}" method="post">
        @csrf
        <div class="form-control flex flex-col mt-8">
            <label for="email-signin" class="text-[#0A0A0B] font-medium mb-2">Tên đăng nhập hoặc địa chỉ email *</label>
            <input type="email" id="email-signin"
                class="outline-none p-2 lg:w-1/2 border-[#eaeaead9] border-[1px] shadow-sm shadow-gray-400" name="email"
                value="{{old('resetedemail') ?? ''}}">
            <span class="text-red-400"> {{ $errors->resetPassword->first('email') ?? '' }}</span>
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