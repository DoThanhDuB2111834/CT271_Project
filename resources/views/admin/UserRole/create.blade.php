@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Create User</h3>
                </div>
            </div>
        </div>
        <div class="card">
            <form action="{{route('UserRole.store')}}" method="post">
                @csrf 
                <div class="card-body row">
                    <div class="col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="email">Username(email):</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"
                                value="{{old('email') ?? ''}}" />
                            @error('email')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter password" value="" />
                            @error('password')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confimr password:</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" placeholder="Enter password" value="" />
                            @error('password_confirmation')
                                <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-8">

                        <h2>Gán vai trò: </h2>
                        <div class="form-group">
                            @foreach ($roles as $role)
                                <label class="selectgroup-item me-2">
                                    <input type="checkbox" class="selectgroup-input" name="roles[]" value="{{$role->name}}">
                                    <span class="selectgroup-button">{{$role->name}}</span>
                                </label>
                            @endforeach
                        </div>

                    </div>
                    <div class="col-12 mt-4">
                        <h2>Phân quyền:</h2>
                        <div class="form-group">
                            <div class="row ">
                                @foreach ($permissions as $groupName => $permission)

                                    <div class="col-4 mb-3">
                                        <h4>{{$groupName}}</h4>
                                        @foreach ($permission as $item)
                                            <label class="selectgroup-item me-2">
                                                <input type="checkbox" class="selectgroup-input" name="permissions[]" value="{{$item->name}}"
                                                    >
                                                <span class="selectgroup-button">{{$item->name}}</span>
                                            </label>
                                        @endforeach
                                    </div>

                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-success m-4">Submits</button>
            </form>
        </div>
    </div>
</div>
@endsection