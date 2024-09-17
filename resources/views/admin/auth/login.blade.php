<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login admin</title>
  @vite('resources/css/app.css')
</head>

<body class="bg-[#7781a1]">
  <div class="mt-36">
    <div class="m-auto max-w-md">
      @if (session('message'))
      <h1 class="text-red-50">{{session('message')}}</h1>
    @endif
      <form class="" action="/admin/login" method="post">
        @csrf
        <h1 class="text-center text-3xl">Admin</h1>
        <label class="block mb-4">
          <span class="block text-sm font-medium text-slate-700">Email</span>
          <!-- Using form state modifiers, the classes can be identical for every input -->
          <input type="email" name="email" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
      focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
      disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
      invalid:border-pink-500 invalid:text-pink-600
      focus:invalid:border-pink-500 focus:invalid:ring-pink-500
    " />
        </label>
        <!-- ... -->
        <label class="block mb-4">
          <span class="block text-sm font-medium text-slate-700">password:</span>
          <!-- Using form state modifiers, the classes can be identical for every input -->
          <input type="password" name="password" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
      focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
      disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
      invalid:border-pink-500 invalid:text-pink-600
      focus:invalid:border-pink-500 focus:invalid:ring-pink-500
    " />
        </label>
        <!-- ... -->
        <input type="submit" value="Đăng nhập"
          class="block w-full h-9 bg-[#171b2a] cursor-pointer rounded-lg mt-6 text-white">
      </form>
    </div>
  </div>
</body>

</html>