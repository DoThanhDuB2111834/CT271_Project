@extends('client.layouts.app')
@section('content')
<section class="max-w-screen-xl mx-auto mt-16">
    <hr class="mb-8">
    <h1>Chúng tôi đã gửi email xác nhận tài khoản, vui lòng xác nhận bằng cách nhấn vào link được gửi trong email. Nếu
        bạn không thấy email hãy nhấn nút gửi lại dưới đây</h1>
    @if (session('status'))
        <p class="text-green-500">{{session('status')}}</p>
    @endif
    <form action="{{ route('verification.send') }}" method="post">
        @csrf
        <button type="submit"
            class="uppercase mt-4 bg-[#0a0a0b] text-white text-base text-center font-medium px-4 py-2">Gửi lại email xác
            nhận</button>
    </form>
</section>
@endsection