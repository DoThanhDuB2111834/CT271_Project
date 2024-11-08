@extends('admin.layouts.app')
@php
$userRoles = $user->roles->pluck('id')->toArray();
$userpermissions = $user->permissions->pluck('id')->toArray();
@endphp
@section('content')
<div class="container">
    <form action="{{route('UserRole.update', $user->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="page-inner">
        <div class="page-header">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Users</h3>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <p class="fs-5 mb-2">Tên khách hàng: <span class="ms-3">{{$user->name}}</span></p>
                        <p class="fs-5 mb-2">Email: <span class="ms-3">{{$user->email}}</span>
                        <p class="fs-5 mb-2">Số điện thoại: <span class="ms-3">{{$user->phone_number}}</span>
                        <p class="fs-5 mb-2">Địa chỉ: <span class="ms-3">{{$user->address}}</span></p>
                        <p class="fs-5 mb-2">Giới tính: <span class="ms-3">{{$user->gender}}</span></p>
                        <p class="fs-5 mb-2">Ngày sinh: <span class="ms-3">{{$user->birth_date}}</span></p>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <h2>Vai trò:</h2>
                        <div class="form-group">
                            @foreach ($roles as $role)
                                <label class="selectgroup-item me-2">
                                    <input type="checkbox" class="selectgroup-input" name="roles[]" value="{{$role->name}}"
                                        {{in_array($role->id, $userRoles) ? 'checked' : ''}}>
                                    <span class="selectgroup-button">{{$role->name}}</span>
                                </label>
                            @endforeach
                        </div>
                        
                    </div>
                    <div class="col-12">
                        <h2>Quyền: </h2>
                        <div class="form-group">
                            <div class="row ">
                            @foreach ($permissions as $groupName => $permission)
                                
                                    <div class="col-4 mb-3">
                                        <h4>{{$groupName}}</h4>
                                    @foreach ($permission as $item)
                                        <label class="selectgroup-item me-2">
                                            <input type="checkbox" class="selectgroup-input" name="permissions[]" value="{{$item->name}}"
                                                {{in_array($item->id, $userpermissions) ? 'checked' : ''}}>
                                            <span class="selectgroup-button">{{$item->name}}</span>
                                        </label>
                                    @endforeach
                                    </div>
                                
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
            
        </div>
        
    </div>
    </form>
</div>
@endsection