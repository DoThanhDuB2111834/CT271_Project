@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                <div>
                    <h3 class="fw-bold mb-3">Orders</h3>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <div class="d-flex flex-row col-3">
                        <label for="order_status" class="col-4 d-flex align-items-center fs-5">Trạng thái:</label>
                        <select name="order_status" id="order_status" class="form-select form-control-lg">
                            <option value="Tất cả">Tất cả</option>
                            <option value="Chờ xác nhận">Chờ xác nhận</option>
                            <option value="Đang xử lý">Đang xử lý</option>
                            <option value="Đang giao hàng">Đang giao hàng</option>
                            <option value="Đã hoàn thành">Đã hoàn thành</option>
                            <option value="Đã hủy">Đã hủy</option>
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover dataTable">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>username
                                    </th>
                                    <th>address</th>
                                    <th>state</th>
                                    <th>created_at</th>
                                    <th colspan="3">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>id</th>
                                    <th>username</th>
                                    <th>address</th>
                                    <th>state</th>
                                    <th>created_at</th>
                                    <th colspan="3">Action</th>
                                </tr>
                            </tfoot>
                            <tbody id="body-table-order">
                                @foreach ($orders as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->username}}</td>
                                        <td>{{$item->address}}</td>
                                        <td>{{$item->getCurrentStatus()}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>
                                            <a href="{{route('order.show', $item->id)}}" class="btn btn-info">Info</a>
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
<script>
    function formatDate(apiDate) {
        // Tạo một đối tượng Date từ chuỗi thời gian
        const date = new Date(apiDate);

        // Lấy các thành phần ngày và giờ
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0'); // Tháng bắt đầu từ 0 nên cần +1
        const day = String(date.getDate()).padStart(2, '0');
        const hours = String(date.getHours()).padStart(2, '0');
        const minutes = String(date.getMinutes()).padStart(2, '0');
        const seconds = String(date.getSeconds()).padStart(2, '0');

        // Kết hợp các thành phần thành định dạng mong muốn
        const formattedDate = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;

        return formattedDate;
    }

    var table_body = document.getElementById('body-table-order');
    document.getElementById('order_status').addEventListener('change', async function (event) {
        var status = this.value;
        const response = await fetch(`api/findOrderWithState/${status}`, {
            method: 'GET',
            headers: {
                "Content-Type": "application/json",
            },
        });

        const ApiData = await response.json();
        const orders = ApiData.orders;
        table_body.innerHTML = '';
        orders.forEach(order => {
            console.log(order);
            const rowElemet = document.createElement('tr');
            const idElement = document.createElement('td');
            idElement.textContent = order.id;
            const usernameElement = document.createElement('td');
            usernameElement.textContent = order.username;
            const addressElement = document.createElement('td');
            addressElement.textContent = order.address;
            const stateElement = document.createElement('td');
            stateElement.textContent = order.currentStatus;
            const created_atElement = document.createElement('td');
            created_atElement.textContent = formatDate(order.created_at);
            const actionElement = document.createElement('td');
            const showElement = document.createElement('a');
            showElement.classList.add('btn');
            showElement.classList.add('btn-info');
            showElement.href = `order/${order.id}`;
            showElement.textContent = 'Info';
            actionElement.appendChild(showElement);

            rowElemet.appendChild(idElement);
            rowElemet.appendChild(usernameElement);
            rowElemet.appendChild(addressElement);
            rowElemet.appendChild(stateElement);
            rowElemet.appendChild(created_atElement);
            rowElemet.appendChild(actionElement);

            table_body.appendChild(rowElemet);
        });
    });
</script>
@endsection