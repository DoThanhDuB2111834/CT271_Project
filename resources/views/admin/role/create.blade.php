@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Role</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form class="card" action="{{route('role.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <div class="card-title">Form Elements</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="role_name">Name:</label>
                                    <input type="text" class="form-control" id="role_name" name="name"
                                        placeholder="Enter product name" value="{{old('name') ?? ''}}" />
                                    @error('name')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Example multiple select</label>
                                    <select class="form-control" id="exampleFormControlSelect2" name="group">
                                        <option value="">--none--</option>
                                        <option value="admin">admin</option>
                                        <option value="customer">customer</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="">Permission:</label>
                                <div class="row">
                                    @foreach ($permissions as $groupName => $permission)
                                        <div class="col-4">
                                            <h4>{{ $groupName }}</h4>
                                            <div>
                                                @foreach ($permission as $item)
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="permission_names[]" {{ in_array($item->name, old('permission_names') ?? []) ? 'checked' : '' }}
                                                            value="{{ $item->name }}">
                                                        <label class="">{{ $item->name}}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection