@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Create coupon</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form class="card" id="created_category_form" action="{{route('coupon.store')}}" method="post">
                    @csrf
                    <div class="card-header">
                        <div class="card-title">Form Elements</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="Category_name">Value:</label>
                                    <input type="number" min="1" max="100" class="form-control" id="Category_name"
                                        name="value" placeholder="Enter value" value="{{old('value') ?? ''}}" />
                                    @error('value')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="startedDate">startedDate:</label>
                                    <input type="date" class="form-control" id="startedDate" name="startedDate"
                                        placeholder="Enter startedDate" value="{{old('startedDate') ?? ''}}" />
                                    @error('startedDate ')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="endedDate">endedDate:</label>
                                    <input type="date" class="form-control" id="endedDate" name="endedDate"
                                        placeholder="Enter endedDate" value="{{old('endedDate') ?? ''}}" />
                                    @error('endedDate ')
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