@extends('admin.layouts.app')
@php
    function formatedPrice($price)
    {
        return number_format($price, 0, ',', '.') . '₫';
    }
@endphp
@section('css')
<link rel="stylesheet" href="{{ asset('admin/base/css/goods_receipt.css') }}" />
@endsection
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Discount infor</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="Category_name">Description:</label>
                                    <textarea class="form-control" id="Description" name="description"
                                        rows="3">{{$discount->description}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="Category_name">Percentage:</label>
                                    <input type="text" class="form-control" id="Category_name" name="reason"
                                        placeholder="Enter reason name" value="{{$discount->percentage}}" />

                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">startedDate:</label>
                                    <input type="date" class="form-control" id="exampleFormControlSelect1"
                                        name="supplier_id" value="{{$discount->startedDate}}">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">endedDate:</label>
                                    <input type="date" class="form-control" id="exampleFormControlSelect1"
                                        name="supplier_id" value="{{$discount->endedDate}}">
                                </div>
                            </div>
                        </div>
                        <div class="card-header p-3 mt-5" style="background-color: #ddd;">
                            <div class="d-flex align-items-center">
                                <h1>Danh sách sản phẩm được khuyến mãi: </h1>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="add-row"
                                                class="display table table-striped table-hover dataTable" role="grid"
                                                aria-describedby="add-row_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th>id</th>
                                                        <th>
                                                            Name</th>
                                                        <th>size</th>
                                                        <th>color</th>
                                                        <th>price</th>

                                                    </tr>
                                                </thead>
                                                <tbody id="table_product_detail">
                                                    @foreach ($product_infors as $item)
                                                        <tr role="row">
                                                            <td>{{$item->get('id')}}
                                                            </td>
                                                            <td>{{$item->get('name')}}</td>
                                                            <td>{{$item->get('size')}}</td>
                                                            <td>{{$item->get('color')}}</td>
                                                            <td>{{formatedPrice($item->get('price'))}}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{asset('admin/base/js/base.js')}}"></script>
<script src="{{asset('admin/base/js/goodsReceiptDetailHandler.js')}}"></script>

@endsection