@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Product info</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="product_name">Name:</label>
                                <input type="text" class="form-control" id="product_name" name="name"
                                    placeholder="Enter product name" value="{{ $product->name}}" />

                            </div>
                            <div class="form-group">
                                <label for="product_name">Size:</label>
                                <input type="text" class="form-control" id="product_name" name="size"
                                    placeholder="Enter product size" value="{{ $product->size}}" />

                            </div>
                            <div class="form-group">
                                <label for="product_name">Color:</label>
                                <input type="text" class="form-control" id="product_name" name="color"
                                    placeholder="Enter product Color" value="{{ $product->color}}" />

                            </div>
                            <div class="form-group">
                                <label for="product_name">Price:</label>
                                <input type="number" class="form-control" id="product_name" name="price"
                                    placeholder="Enter product Price" value="{{ $product->price}}" />

                            </div>
                        </div>
                        <div class="col-md-6 col-lg-8 row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="Description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="5">{{ $product->description}}
                                                                                          </textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <h5>Danh mục:</h5>
                                    <ul>
                                        @foreach ($product->categories as $category)
                                            <li>{{$category->name}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-2">Image:</div>
                            <div id="show-old-image overflow-hidden" class="row col-12">

                                @foreach ($product->Images()->get() as $item)
                                    <div class="col-6 mt-4"
                                        style="background-image: url(<?php    echo asset($item->url) ?>); height: 150px; background-repeat: no-repeat; background-size: cover; background-position: center;">

                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection