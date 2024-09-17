@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Products</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form class="card" action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="type_image" value="product">
                    <div class="card-header">
                        <div class="card-title">Form Elements</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="product_name">Name:</label>
                                    <input type="text" class="form-control" id="product_name" name="name"
                                        placeholder="Enter product name" />
                                    <!-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with
                                                                anyone
                                                                else.</small> -->
                                    @error('name')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="product_name">Size:</label>
                                    <input type="text" class="form-control" id="product_name" name="size"
                                        placeholder="Enter product size" />
                                    <!-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with
                                                                                            anyone
                                                                                            else.</small> -->
                                    @error('size')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="product_name">Color:</label>
                                    <input type="text" class="form-control" id="product_name" name="color"
                                        placeholder="Enter product Color" />
                                    <!-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with
                                                                                                                        anyone
                                                                                                                        else.</small> -->
                                    @error('color')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="product_name">Price:</label>
                                    <input type="number" class="form-control" id="product_name" name="price"
                                        placeholder="Enter product Price" />
                                    <!-- <small id="emailHelp2" class="form-text text-muted">We'll never share your email with
                                                                                            anyone
                                                                                            else.</small> -->
                                    @error('price')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Image</label>
                                    <input type="file" class="form-control-file" id="image-input" accept="image/*"
                                        name="image" />
                                </div>
                                <div id="show-image"
                                    style="max-width: 100%; height: 350px; background-size: cover; background-repeat: no-repeat;background-position: center;">
                                    <!-- <img src="" id="" alt=""
                                        style="max-width: 100%; height: 350px; display: block;"> -->
                                </div>
                                @error('image')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="Description">Description</label>
                                    <textarea class="form-control" id="Description" name="description" rows="5">
                                                          </textarea>
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

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"
                integrity="sha512-WFN04846sdKMIP5LKNphMaWzU7YpMyCU245etK3g/2ARYbPK9Ub18eG+ljU96qKRCWh+quCY7yefSmlkQw1ANQ=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script src="
        https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js
        "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor5/43.0.0/ckeditor.min.js"
    integrity="sha512-UzvuFtD3EPN++CAS7K8gRpp+UrNZWUV94LW3I+1r4hyWQT6gelrcL1XdXPt0i5h6eI/Ry1WNno5eQl4fcrOjAw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function () {
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    console.log(1);
                    // $('#show-image').attr('src', e.target.result);
                    $('#show-image').css('background-image', `url("${e.target.result}")`);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#image-input').change(function () {

            readURL(this);

        });
    });
</script>
@endsection