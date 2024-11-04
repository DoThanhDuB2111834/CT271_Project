@extends('admin.layouts.app')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Products</h3>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Basic</h4>
                <a href="{{route('category.create')}}" class="btn btn-success">Create</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover dataTable"
                        aria-describedby="basic-datatables_info" role="grid">
                        <thead>
                            <tr>
                                <th class="sorting_asc" aria-controls="basic-datatables" aria-sort="ascending"
                                    aria-label="Name: activate to sort column descending" tabindex="0">Name</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th colspan="3" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Create at</th>
                                <th>Update at</th>
                                <th colspan="3" class="text-center">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($categories as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->updated_at}}</td>
                                    @can('update-category')
                                        <td><a href="{{route('category.edit', $item->id)}}" class="btn btn-warning">Edit</a>
                                        </td>
                                    @endcan
                                    @can('delete-category')
                                        <td>
                                            <form action="{{route('category.destroy', $item->id)}}" method="post"
                                                onsubmit="confirmDelete(event);" id="form-delete{{$item->id}}">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" id="btn-delete" data-id="{{$item->id}}"
                                                    type="submit">delete</button>
                                            </form>
                                        </td>
                                    @endcan
                                    <td>
                                        <a href="{{route('category.show', $item->id)}}" class="btn btn-info">Info</a>
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