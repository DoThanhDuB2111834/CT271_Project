<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\order_status;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $order;

    protected $order_status;

    public function __construct(order $order, order_status $order_status)
    {
        $this->order = $order;
        $this->order_status = $order_status;
    }

    public function index()
    {
        $orders = $this->order->all();

        return view('admin.order.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = $this->order->findOrFail($id);

        return view('admin.order.show', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => ['required']
        ]);

        $status = $request->input('status');

        $order = $this->order->findOrFail($id);
        if (count($order->order_status()->where('status', '=', $status)->get()) > 0) {
            return back()->with(['message' => 'Trạng thái này đã tồn tại rồi', 'state' => 'danger']);
        }
        $order->order_status()->create(['status' => $status]);

        return back()->with(['message' => 'Cập nhật trạng thái đơn hàng thành công']);
    }

    public function findOrderWithState(string $state)
    {
        $orders = $this->order->all()->map(function ($order) {
            // Thêm thuộc tính mới
            $order->currentStatus = $order->getCurrentStatus();
            return $order;
        });

        if ($state == 'Tất cả') {
            return response()->json(['success' => true, 'orders' => $orders], Response::HTTP_OK);
        }


        $result = [];

        foreach ($orders as $order) {
            if ($order->getCurrentStatus() == $state) {
                array_push($result, $order);
            }
        }

        return response()->json(['success' => true, 'orders' => $result], Response::HTTP_OK);
    }
}
