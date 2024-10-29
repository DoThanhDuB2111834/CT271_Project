<section>
    <h1 class="text-[#0A0A0B] text-2xl font-semibold">Thông tin cá nhân</h1>
    @if (session('status') == 'profile-updated')
        <p class="text-green-500 text-base">{{session('status')}}</p>
    @endif
    <form action="{{route('profile.update')}}" method="post">
        @csrf
        @method('patch')
        <div class="flex flex-col lg:flex-row flex-wrap">
            <div class="form-control pr-6 basis-1/2 flex flex-col mt-8">
                <label for="username" class="text-sm mb-2">Tên *</label>
                <input type="text" id="username"
                    class="outline-none p-2 border-[#eaeaead9] border-[1px] shadow-sm shadow-gray-400" name="name"
                    value="{{old('name') ?? $user->name}}">
            </div>
            <div class="form-control pr-6 basis-1/2 flex flex-col mt-8">
                <label for="phone_number" class="text-sm mb-2">Số điện thoại *</label>
                <input type="text" id="phone_number"
                    class="outline-none p-2 border-[#eaeaead9] border-[1px] shadow-sm shadow-gray-400"
                    name="phone_number" value="{{old('phone_number') ?? $user->phone_number}}">
                <span class="text-red-400"> {{ $errors->change_profile_infor->first('phone_number') ?? '' }}</span>
            </div>

            <div class="form-control pr-6 flex flex-col mt-8 w-full">
                <label for="address" class="text-sm mb-2">Địa chỉ *</label>
                <input type="text" id="address"
                    class="outline-none p-2 border-[#eaeaead9] border-[1px] shadow-sm shadow-gray-400" name="address"
                    value="{{old('address') ?? $user->address}}">
                <span class="text-red-400"> {{ $errors->change_profile_infor->first('address') ?? '' }}</span>
            </div>

            <div class="form-control pr-6 flex flex-col mt-8 w-full">
                <label for="email" class="text-sm mb-2">Địa chỉ Email *</label>
                <input type="email" id="email"
                    class="outline-none p-2 border-[#eaeaead9] border-[1px] shadow-sm shadow-gray-400" name="email"
                    value="{{old('email') ?? $user->email}}">
                <span class="text-red-400"> {{ $errors->change_profile_infor->first('email') ?? '' }}</span>
            </div>

            <div class="form-control pr-6 basis-1/2 flex flex-col mt-8">
                <label for="gender" class="text-sm mb-2">Giới tính *</label>
                <select name="gender" id="gender"
                    class="outline-none p-2 border-[#eaeaead9] border-[1px] shadow-sm shadow-gray-400">
                    <option value="nam" {{$user->gender == 'nam' ? 'selected' : ''}}>nam</option>
                    <option value="nữ" {{$user->gender == 'nữ' ? 'selected' : ''}}>nữ</option>
                    <option value="khác" {{$user->gender == 'khác' ? 'selected' : ''}}>khác</option>
                </select>
            </div>
            <div class="form-control basis-1/2 pr-6 flex flex-col mt-8 w-full">
                <label for="birth_date" class="text-sm mb-2">Ngày sinh *</label>
                <input type="date" id="birth_date"
                    class="outline-none p-2 border-[#eaeaead9] border-[1px] shadow-sm shadow-gray-400" name="birth_date"
                    value="{{old('email') ?? $user->birth_date}}">
            </div>
            <button type="submit"
                class="uppercase mt-4 bg-[#0a0a0b] text-white text-base text-center font-medium px-4 py-2">Cập nhật
                thông tin</button>
        </div>
    </form>
</section>