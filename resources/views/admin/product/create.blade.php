@extends('admin.layouts.app')
@section('content')
@use('App\Models\category')
@php
    function printListCategory($categories, $indent, $isPrintedCategories)
    {
        foreach ($categories as $category) {
            $isSelected = in_array($category->id, old('categories') ?? []);
            echo ("<option value=\"$category->id\"" . ($isSelected ? 'selected>' : '>') . str_repeat("&ensp;", $indent) . "&#8226; $category->name</option>");
            $isPrintedCategories->push($category);
            if ($category->children()->count() > 0) {
                printListCategory($category->children()->get(), $indent + 2, $isPrintedCategories);
            }
        }
    }

    function printTest($categories)
    {
        foreach ($categories as $item) {
            $isSelected = in_array($item->id, old('categories') ?? []);
            echo ("<option value=\"$item->id\"" . ($isSelected ? 'selected>' : '>') . "&#8226; $item->name</option>");
        }
    }
@endphp
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
                                        placeholder="Enter product name" value="{{old('name') ?? ''}}" />
                                    @error('name')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="product_name">Size:</label>
                                    <input type="text" class="form-control" id="product_name" name="size"
                                        placeholder="Enter product size" value="{{old('size') ?? ''}}" />
                                    @error('size')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="product_name">Color:</label>
                                    <input type="text" class="form-control" id="product_name" name="color"
                                        placeholder="Enter product Color" value="{{old('color') ?? ''}}" />
                                    @error('color')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="product_name">Price:</label>
                                    <input type="number" class="form-control" id="product_name" name="price"
                                        placeholder="Enter product Price" value="{{old('price') ?? ''}}" />
                                    @error('price')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-8 row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="Description">Description</label>
                                        <textarea class="form-control" id="Description" name="description" rows="5">
                                                                                          {{old('description') ?? ''}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="chidrenCategorys">Categories: </label>
                                        <select multiple="" class="form-select form-control-lg" id="chidrenCategorys"
                                            name="categories[]">
                                            @php
                                                $isPrintedCategories = collect([]);
                                                printListCategory($highestCategories, 0, $isPrintedCategories);
                                                $allCategories = category::all();
                                                $isNotPrintedCategories = $allCategories->diff($isPrintedCategories);
                                                printTest($isNotPrintedCategories);
                                            @endphp
                                        </select>
                                        @error('categories')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Image</label>
                                    <input type="file" class="form-control-file" id="image-input" accept="image/*"
                                        multiple name="images[]" />
                                </div>
                                <div id="show-image" class="row" style="max-width: 100%; height: 300px;">

                                </div>
                                @error('image')
                                    <span class="text-danger"> {{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="image-detail"
                    style="max-width: 100%; height: 350px; background-size: cover; background-repeat: no-repeat;background-position: center;">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="button-remove-image-modal">Remove image</button>
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
            function removeImage(imageIndex) {
                var dataTransfer = new DataTransfer();

                Array.from(input.files).forEach((file, i) => {
                    if (i != imageIndex) {
                        dataTransfer.items.add(file);
                    }
                });

                input.files = dataTransfer.files;

                // Cập nhật lại danh sách file hiển thị
                var event = new Event('change');
                input.dispatchEvent(event);
                $('#exampleModal').modal('hide');
            }

            function loadImage(e) {
                var imageIndex = e.currentTarget.getAttribute('image-index');
                var imageFile = input.files[imageIndex];
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image-detail').css('background-image', `url("${e.currentTarget.result}")`);
                };
                reader.readAsDataURL(imageFile);
                document.getElementById('exampleModalLabel').innerText = imageFile.name;
                var buttonRemoveImage = document.getElementById('button-remove-image-modal');
                buttonRemoveImage.onclick = function (e) {
                    removeImage(imageIndex);
                };
                var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
                myModal.show();
            }

            var showImagePanel = document.getElementById('show-image');
            showImagePanel.innerHTML = "";
            Array.from(input.files).forEach((file, i) => {
                console.log(`index ${i}: ${file}`);
            });
            for (var i = 0; i < input.files.length && input.files; i++) {
                var file = input.files[i];
                var listItem = document.createElement('div');
                listItem.setAttribute('class', 'col-md-4 overflow-hidden');
                listItem.setAttribute('image-index', i);
                var demo_icon = document.createElement('div');
                demo_icon.setAttribute('class', 'demo-icon');
                var icon_preview = document.createElement('div');
                icon_preview.setAttribute('class', 'icon-preview');
                var icon = document.createElement('i');
                icon.setAttribute('class', 'fa fa-file-image');
                var fileName = document.createElement('div');
                fileName.setAttribute('class', 'icon-class');
                fileName.innerHTML = file.name;
                fileName.style.overflow = 'hidden';
                fileName.style.whiteSpace = 'nowrap';
                fileName.style.textOverflow = "ellipsis";

                icon_preview.appendChild(icon);
                demo_icon.appendChild(icon_preview);
                demo_icon.appendChild(fileName);
                listItem.appendChild(demo_icon);
                showImagePanel.appendChild(listItem);
                listItem.addEventListener("click", function (e) {
                    loadImage(e);
                });
            }
        }

        $('#image-input').change(function () {
            readURL(this);
        });
    });
</script>
@endsection