@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Category info</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="Category_name">Name:</label>
                                <input type="text" class="form-control" id="Category_name" name="name"
                                    value="{{$category->name }}" />
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <h5>Danh mục cha: </h5>
                            <ul>
                                @foreach ($category->parent as $item)
                                    <li>{{$item->name}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <h5>Danh mục con: </h5>
                            <ul>
                                @foreach ($category->children as $item)
                                    <li>{{$item->name}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection