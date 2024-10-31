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
                    <h3 class="fw-bold mb-3">Edit goods_receipt</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form id="created_category_form" action="{{route('goods_receipt.update', $goods_receipt->id)}}"
                    method="post">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Form Elements</div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="Category_name">Reason:</label>
                                        <input type="text" class="form-control" id="Category_name" name="reason"
                                            placeholder="Enter reason name"
                                            value="{{old('reason') ?? $goods_receipt->reason}}" />
                                        @error('reason')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Supplier:</label>
                                        <select class="form-select" id="exampleFormControlSelect1" name="supplier_id">
                                            <option value="">--</option>
                                            @foreach ($suppliers as $item)
                                                <option value="{{$item->id}}" {{$item->id == (old('supplier') ?? $goods_receipt->supplier_id) ? 'selected' : ''}}>
                                                    {{$item->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('supplier')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label for="Category_name">Description:</label>
                                        <textarea class="form-control" id="Description" name="description"
                                            rows="3">{{old('description') ?? $goods_receipt->description}}</textarea>
                                        @error('description')
                                            <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-header p-3 mt-5" style="background-color: #ddd;">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title col-lg-4">Add Products:</h4>
                                    <button type="button" class="btn btn-primary btn-round ms-auto"
                                        data-bs-toggle="modal" data-bs-target="#addProductModal">
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
                                                        <input type="text" placeholder="Enter product name"
                                                            id="seachBar" class="form-control">
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
                                                    class="display table table-striped table-hover dataTable"
                                                    role="grid" aria-describedby="add-row_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th>id</th>
                                                            <th>
                                                                Name</th>
                                                            <th>size</th>
                                                            <th>color</th>
                                                            <th>quantity
                                                            </th>
                                                            <th>price</th>
                                                            <th>total</th>
                                                            <th>
                                                                Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="table_product_detail">
                                                        @foreach (old('product_infors') ?? $product_infors as $item)
                                                            <tr role="row">
                                                                <td>{{$item->get('id')}}<input type="hidden"
                                                                        name="product_ids[]" value="{{$item->get('id')}}">
                                                                </td>
                                                                <td>{{$item->get('name')}}</td>
                                                                <td>{{$item->get('size')}}</td>
                                                                <td>{{$item->get('color')}}</td>
                                                                <td><input type="number" class="form-control"
                                                                        name="product_quantity[]"
                                                                        value="{{$item->get('quantity')}}"
                                                                        onchange="updateRecord(event);"></td>
                                                                <td><input type="number" class="form-control"
                                                                        name="product_price[]"
                                                                        value="{{$item->get('price')}}"
                                                                        onchange="updateRecord(event);">
                                                                </td>
                                                                <td field="total">
                                                                    {{$item->get('price') * $item->get('quantity')}}
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
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{asset('admin/base/js/base.js')}}"></script>
<script src="{{asset('admin/base/js/goodsReceiptDetailHandler.js')}}"></script>
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
                    const product = {
                        id: productId,
                        name: productName,
                        size: productSize,
                        color: productColor,
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