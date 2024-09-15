<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <h1 class="text-green-600">Hello 
    {{ Auth::user()->name }}    
    You are login!</h1>
    <h2>
        Role: {{Auth::user()->isAdmin() ? 'admin' : 'customer'}}
        Check: {{Auth::Check()}}
    </h2>

    @if (session('message'))
        <h1 class="text-red-400">{{ session('message') }}</h1>
    @endif
    <form action="/logout" method="post">
        @csrf
        <input type="submit" value="Logout!">
    </form>
</body>
</html>