@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Coupon</h3>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    @can('create-coupon')
                        <a href="{{route('coupon.create')}}" class="btn btn-success">Create</a>
                    @endcan
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover dataTable">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>value</th>
                                    <th>startedDate</th>
                                    <th>endedDate</th>
                                    <th colspan="3">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>startedDate</th>
                                    <th>endedDate</th>
                                    <th colspan="3">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($coupons as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->value}}</td>
                                        <td>{{$item->startedDate}}</td>
                                        <td>{{$item->endedDate}}</td>
                                        @can('update-coupon')
                                            <td><a href="{{route('coupon.edit', $item->id)}}" class="btn btn-warning">Edit</a>
                                            </td>
                                        @endcan
                                        @can('delete-coupon')
                                            <td>
                                                <form action="{{route('coupon.destroy', $item->id)}}" method="post"
                                                    onsubmit="confirmDelete(event);" id="form-delete{{$item->id}}">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger" id="btn-delete" data-id="{{$item->id}}"
                                                        type="submit">delete</button>
                                                </form>
                                            </td>
                                        @endcan
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