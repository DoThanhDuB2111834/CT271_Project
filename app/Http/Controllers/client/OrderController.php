<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $cart;

    protected $order;

    public function __construct(cart $cart, order $order)
    {
        $this->cart = $cart;
        $this->order = $order;
    }

    public function index(Request $request)
    {
        $userId = $request->user()->id;

        $orders = $this->order->where('user_id', '=', $userId)->get();

        return view('client.OrderOverviewPage', compact('orders'));
    }

    public function order(Request $request)
    {
        $dataCreate = $request->validate([
            'username' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
        ]);
        $couponIds = $request->input('couponIds') ?? [];

        $userId = $request->user()->id;
        $cart = $this->cart->firstOrCreateBy($userId);

        $order = $this->order->create([
            'username' => $dataCreate['username'],
            'email' => $dataCreate['email'],
            'phone_number' => $dataCreate['phone_number'],
            'address' => $dataCreate['address'],
            'user_id' => $userId,
        ]);

        $total_price = 0.0;
        foreach ($cart->items as $item) {
            $product = Product::find($item->product_id);
            $product->quantity -= $item->quantity;
            $product->save();
            $order->items()->create(['quantity' => $item->quantity, 'price' => $item->price, 'product_id' => $item->product_id]);
            $total_price += $item->price * $item->quantity;
            $item->delete();
        }

        $order->update(['total_price' => $total_price]);

        $order->order_status()->create(['status' => 'Chờ xác nhận']);

        $order->coupons()->attach($couponIds);

        $cart->delete();

        return redirect()->route('clientOrder.index')->with(['message' => 'Đặt hàng thành công']);
    }
}
