@extends('admin.layouts.app')
@section('content')
@use('App\Models\category')
@use('Illuminate\Support\Collection')
@php
    // Hàm hiển thị những phần tử đã có cha hoặc con
    function printListCategory($categories, $editCategory, $type, $indent, Collection $isPrintedCategories)
    {
        foreach ($categories as $item) {
            $isOldSubmit = in_array($item->id, old($type ? 'parentCategorys' : 'chidrenCategorys') ?? []);
            $isParentOrChild = ($type ? $item->isParentOf($editCategory) : $item->isChildOf($editCategory));
            // Khi lần đầu tải trang edit thì hiển thị những danh mục cha hoặc con đang được lưu
            // Nếu người dùng đã submit nhưng bị lỗi trả về thì hiển thị những gì đã submit trước đó để người dùng tiếp tục chỉnh sửa

            $isSelected = old($type ? 'parentCategorys' : 'chidrenCategorys') ? $isOldSubmit : $isParentOrChild;
            echo ("<option value=\"$item->id\"" . ($item->id == $editCategory->id ? 'hidden' : '') . ($isSelected ? 'selected>' : '>') . str_repeat(" &ensp;", $indent) . "&#8226; $item->name</option>");
            $isPrintedCategories->push($item);
            if ($item->children()->count() > 0) {
                printListCategory($item->children()->get(), $editCategory, $type, $indent + 2, $isPrintedCategories);
            }
        }
    }
    // Hàm hiển thị những phần tử còn lại
    function printTest($categories, $editCategory, $type)
    {
        foreach ($categories as $item) {
            $isSelected = in_array($item->id, old($type ? 'parentCategorys' : 'chidrenCategorys') ?? []);
            echo ("<option value=\"$item->id\"" . ($item->id == $editCategory->id ? 'hidden' : '') . ($isSelected ? 'selected>' : '>') . "&#8226; $item->name</option>");
        }
    }
@endphp
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Edit category: {{$category->name}}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form class="card" id="created_category_form" action="{{route('category.update', $category->id)}}"
                    method="post">
                    @method('put')
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
                                        placeholder="Enter Category name"
                                        value="{{ old('name') ?? $category->name }}" />
                                    @error('name')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="parentCategorys">Parent category: </label>
                                    <select multiple="" class="form-select form-control-lg" id="parentCategorys"
                                        onchange="checkContrainOfParentAndChild()" name="parentCategorys[]">
                                        @php
                                            $isPrintedCategories = collect([]);
                                            printListCategory($hightestParent, $category, true, 0, $isPrintedCategories);
                                            $allCategories = category::all();
                                            $isNotPrintedCategories = $allCategories->diff($isPrintedCategories);
                                            printTest($isNotPrintedCategories, $category, true);
                                        @endphp
                                    </select>
                                    @error('parentCategorys')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="chidrenCategorys">Chidren category: </label>
                                    <select multiple="" class="form-select form-control-lg" id="chidrenCategorys"
                                        onchange="checkContrainOfParentAndChild()" name="chidrenCategorys[]">
                                        @php
                                            $isPrintedCategories = collect([]);
                                            printListCategory($hightestParent, $category, false, 0, $isPrintedCategories);
                                            $allCategories = category::all();
                                            $isNotPrintedCategories = $allCategories->diff($isPrintedCategories);
                                            printTest($isNotPrintedCategories, $category, false);
                                        @endphp

                                    </select>
                                    @error('chidrenCategorys')
                                        <span class="text-danger"> {{ $message }}</span>
                                    @enderror
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