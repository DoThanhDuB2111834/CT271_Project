@extends('admin.layouts.app')
@php
    function formatedPrice($price)
    {
        return number_format($price, 0, ',', '.') . '₫';
    }
@endphp
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">goods_receipts</h3>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Basic</h4>
                    <a href="{{route('goods_receipt.create')}}" class="btn btn-success">Create</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover dataTable">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>total_price</th>
                                    <th colspan="3">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>id</th>
                                    <th>total_price</th>
                                    <th colspan="3">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($goods_receipts as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{formatedPrice($item->total_price)}}</td>
                                        @can('update-goods_receipt')
                                            <td><a href="{{route('goods_receipt.edit', $item->id)}}"
                                                    class="btn btn-warning">Edit</a>
                                            </td>
                                        @endcan
                                        @can('delete-goods_receipt')
                                            <td>
                                                <form action="{{route('goods_receipt.destroy', $item->id)}}" method="post"
                                                    onsubmit="confirmDelete(event);" id="form-delete{{$item->id}}">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger" id="btn-delete" data-id="{{$item->id}}"
                                                        type="submit">delete</button>
                                                </form>
                                            </td>
                                        @endcan
                                        <td>
                                            <a href="{{route('goods_receipt.show', $item->id)}}"
                                                class="btn btn-info">Info</a>
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
</div>
@endsection
@section('scripts')
<script src="{{asset('admin/base/js/base.js')}}"></script>

<!-- Notificate message -->
@if (session('message'))
    <script>
        var state = <?php    echo "'" . session()->pull('state') . "'"?>;
        var message = <?php    echo "'" . session()->pull('message') . "'"?>;
        notificate(state, message);
    </script>
    <?php
        session()->forget('state');
        session()->forget('message');
                                                                                                                                    ?>
@endif
@endsection