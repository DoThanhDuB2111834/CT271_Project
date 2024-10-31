@extends('admin.layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('admin/base/css/goods_receipt.css') }}" />
@endsection
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Create discount</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form class="card" id="created_category_form" action="{{route('discount.store')}}" method="post">
                    @csrf
                    <div class="card-header">
                        <div class="card-title">Form Elements</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="description">description:</label>
                                    <textarea class="form-control" id="description" name="description" rows="5">
                                                                                          {{old('description') ?? ''}}</textarea>
                                    @error('description')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="discount_percentage">percentage (%):</label>
                                    <input type="number" class="form-control" id="discount_percentage" name="percentage"
                                        min="1" max="100" placeholder="Enter percent"
                                        value="{{old('percentage') ?? ''}}" />
                                    @error('percentage')
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
                        <div class="card-header p-3 mt-5" style="background-color: #ddd;">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title col-lg-4">Add Products:</h4>
                                <button type="button" class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                                    data-bs-target="#addProductModal">
                                    <i class="fa fa-plus"></i>
                                    add Product
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="modal fade modal-lg" id="addProductModal" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                                Tìm kiếm sản phẩm
                                            </h5>
                                            <span class="close-add-product-modal fs-2" style="cursor: pointer;"
                                                data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </span>
                                        </div>
                                        <div class="modal-body overflow-auto" style="height: 550px;">
                                            <div class="">
                                                <div class="input-group" id="search_panel">
                                                    <span class="input-group-text ">
                                                        <i class="fa fa-search search-icon"></i>
                                                    </span>
                                                    <input type="text" placeholder="Enter product name" id="seachBar"
                                                        class="form-control">
                                                    <ul id="panel_show_search_result" class="">
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-danger close-add-product-modal"
                                                data-dismiss="modal">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                                        <th>
                                                            Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="table_product_detail">
                                                    @foreach (old('product_infors') ?? [] as $item)
                                                        <tr role="row">
                                                            <td>{{$item->get('id')}}<input type="hidden"
                                                                    name="product_ids[]" value="{{$item->get('id')}}">
                                                            </td>
                                                            <td>{{$item->get('name')}}</td>
                                                            <td>{{$item->get('size')}}</td>
                                                            <td>{{$item->get('color')}}</td>
                                                            <td>{{$item->get('price')}}
                                                            </td>
                                                            <td><i class="fa fa-times" style="cursor: pointer;"
                                                                    onclick="removeRecord(event);"></i>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
<script src="{{asset('admin/base/js/base.js')}}"></script>
<script src="{{asset('admin/base/js/discountDetailHandler.js')}}"></script>
<script type="module">
    import { searchBarHandler } from '<?php echo asset('admin/base/js/searchBarHandler.js')?>';

    let searchBar = new searchBarHandler();

    document.getElementById('seachBar').onkeyup = async function (e) {
        let searchInput = e.target.value;
        const key = e.key;

        if (searchInput != "" && (/^[A-Za-z]$/.test(key) || key === 'Backspace')) {
            await searchBar.search(searchInput);

            let searchResultItems = document.querySelectorAll('.search_result_item');
            searchResultItems.forEach(e => {
                e.addEventListener('click', function (e) {
                    let productId = e.currentTarget.querySelector('[field="id"]').getAttribute('value');
                    let productName = e.currentTarget.querySelector('[field="name"]').getAttribute('value');
                    let productSize = e.currentTarget.querySelector('[field="size"]').getAttribute('value');
                    let productColor = e.currentTarget.querySelector('[field="color"]').getAttribute('value');
                    let productPrice = e.currentTarget.querySelector('[field="price"]').getAttribute('value');
                    const product = {
                        id: productId,
                        name: productName,
                        size: productSize,
                        color: productColor,
                        price: productPrice,
                    }
                    addProductToTable(product);
                })
            });
        }

    }

    const closeAddProductModalButton = document.querySelectorAll('.close-add-product-modal');
    closeAddProductModalButton.forEach(button => {
        button.addEventListener('click', () => {
            // Thực hiện đóng modal
            $('#addProductModal').modal('hide');
        });
    });
</script>
@endsection