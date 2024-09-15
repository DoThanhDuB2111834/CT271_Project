<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>

<body>
    @if (session('message'))
        <h1 class="text-red-400">{{ session('message') }}</h1>
    @endif
    <form action="/login" method="post">
        @csrf
        <input type="email" name="email" id="" placeholder="abc@gmail.com">
        <input type="password" name="password" id="">
        <input type="checkbox" name="remember" id="">

        <span>Remember me</span>
        <input type="submit" value="Đăng nhập">
    </form>
</body>

</html>