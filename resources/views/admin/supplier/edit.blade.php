@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Update supplier</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form class="card" id="created_category_form" action="{{route('supplier.update', $supplier->id)}}"
                    method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <div class="card-title">Form Elements</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="Category_name">Name:</label>
                                    <input type="text" class="form-control" id="Category_name" name="name"
                                        placeholder="Enter Category name" value="{{old('name') ?? $supplier->name}}" />
                                    @error('name')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="Description">Address</label>
                                    <textarea class="form-control" id="address" name="address" rows="5">
                                                                                          {{old('address') ?? $supplier->address}}</textarea>
                                    @error('address')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
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