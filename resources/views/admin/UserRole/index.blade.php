@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Users</h3>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header d-flex justify-content-end">
                <div class="d-flex flex-row col-3">
                    <label for="type-user-input" class="col-4 d-flex align-items-center fs-5">Nhóm:</label>
                    <select name="type-user-input" id="type-user-input" class="form-select form-control-lg">
                        <option value="all">Tất cả</option>
                        <option value="customer">customer</option>
                        <option value="admin">admin</option>
                        <option value="superadmin">superadmin</option>
                    </select>
                </div>
                @can('create-user')
                    <a href="{{route('UserRole.create')}}" class="ms-4 btn btn-success">Create</a>
                @endcan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover dataTable">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>name
                                </th>
                                <th>role</th>
                                <th>email</th>

                                <th colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>role</th>
                                <th>email</th>

                                <th colspan="3">Action</th>
                            </tr>
                        </tfoot>
                        <tbody id="body-table-User">
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>@foreach ($item->roles as $role)
                                        <p>{{$role->name  }}</p>
                                    @endforeach
                                    </td>
                                    <td>{{$item->email}}</td>

                                    <td>
                                        <a href="{{route('UserRole.edit', $item->id)}}" class="btn btn-warning">Edit
                                            role</a>
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
<script>
    var table_body = document.getElementById('body-table-User');
    document.getElementById('type-user-input').addEventListener('change', async function (event) {
        var typeUser = this.value;
        const response = await fetch(`api/findUserWithRole/${typeUser}`, {
            method: 'GET',
            headers: {
                "Content-Type": "application/json",
            },
        });

        const ApiData = await response.json();

        const users = ApiData.users;
        table_body.innerHTML = '';
        users.forEach(user => {
            console.log(user);
            const rowElemet = document.createElement('tr');
            const idElement = document.createElement('td');
            idElement.textContent = user.id;
            const nameElement = document.createElement('td');
            nameElement.textContent = user.name;
            const roleElementList = document.createElement('td');
            const roles = user.roles;
            roles?.forEach(role => {
                roleElementItem = document.createElement('p');
                roleElementItem.textContent = role.name;
                roleElementList.appendChild(roleElementItem);
            });
            const emailElement = document.createElement('td');
            emailElement.textContent = user.email
            const actionElement = document.createElement('td');
            const editElement = document.createElement('a');
            editElement.classList.add('btn');
            editElement.classList.add('btn-warning');
            editElement.href = `UserRole/${user.id}`;
            editElement.textContent = 'Edit role';
            actionElement.appendChild(editElement);

            rowElemet.appendChild(idElement);
            rowElemet.appendChild(nameElement);
            rowElemet.appendChild(roleElementList);
            rowElemet.appendChild(emailElement);
            rowElemet.appendChild(actionElement);

            table_body.appendChild(rowElemet);
        });
    });
</script>
@endsection