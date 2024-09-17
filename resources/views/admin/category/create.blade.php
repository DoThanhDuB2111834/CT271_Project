@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Create category</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form class="card" id="created_category_form" action="{{route('category.store')}}" method="post">
                    @csrf
                    <div class="card-header">
                        <div class="card-title">Form Elements</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="Category_name">Name:</label>
                                    <input type="text" class="form-control" id="Category_name" name="name"
                                        placeholder="Enter Category name" />
                                    @error('name')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="parentCategorys">Parent category: </label>
                                    <select multiple="" class="form-select form-control-lg" id="parentCategorys"
                                        onchange="checkContrainOfParentAndChild()" fdprocessedid="qcw846"
                                        name="parentCategorys[]">
                                        @foreach  ($categories as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="chidrenCategorys">Chidren category: </label>
                                    <select multiple="" class="form-select form-control-lg" id="chidrenCategorys"
                                        onchange="checkContrainOfParentAndChild()" fdprocessedid="qcw846"
                                        name="chidrenCategorys[]">
                                        @foreach  ($categories as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ms-auto text-warning" id="notification">Chú ý: giá trị của parent category
                            và children category không
                            được trùng</div>
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function getSelectedValues(selectElement) {
        const selectedValues = [];
        for (const option of selectElement.options) {
            if (option.selected) {
                selectedValues.push(option.text);
            }
        }
        return selectedValues;
    }

    function checkContrainOfParentAndChild() {
        var parentCategorySelectBox = document.getElementById('parentCategorys');
        var childrenCategorySelecBox = document.getElementById('chidrenCategorys');

        const selectedValuesParent = getSelectedValues(parentCategorySelectBox);
        const selectedValuesChildren = getSelectedValues(childrenCategorySelecBox);

        const commonValues = selectedValuesParent.filter(value => selectedValuesChildren.includes(value));

        if (commonValues.length > 0) {
            swal(`Giá trị bị trùng ${commonValues.join(', ')}`, {
                icon: "warning",
                buttons: {
                    confirm: {
                        className: "btn btn-warning",
                    },
                },
            });
            document.getElementById("notification").innerHTML += ", Bạn có thể bỏ chọn giá trị trong selectbox bằng ctrl + click"
            return 0;
        }
        return 1;
    }

    document.getElementById('created_category_form').addEventListener('submit', function (event) {
        event.preventDefault();
        if (checkContrainOfParentAndChild())
            event.target.submit();
    });
</script>
@endsection