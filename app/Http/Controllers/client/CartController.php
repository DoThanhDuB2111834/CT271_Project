<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    protected $cart;

    protected $product;

    public function __construct(cart $cart, Product $product)
    {
        $this->cart = $cart;
        $this->product = $product;
    }

    public function index()
    {
        return view('client.cart.index');
    }

    public function sync(Request $request)
    {
        $userId = $request->user()->id;
        $cart = $this->cart->firstOrCreateBy($userId);

        $items = $request->input('items');
        $failMessage = [];
        foreach ($cart->items()->with('product')->get() as $cartItem) {
            for ($i = 0; $i < count($items); $i++) {
                if ($cartItem->product_id == $items[$i]['productId']) {
                    if (($cartItem->quantity + $items[$i]['quantity']) > $cartItem->product->quantity) {
                        array_push($failMessage, "Sản phẩm " . $cartItem->product->name . " Không đủ số lượng mà bạn yêu cầu");
                        $cartItem->save();
                        unset($items[$i]); // Xóa phần tử khỏi mảng
                        $items = array_values($items);
                        break;
                    }
                    $cartItem->quantity += $items[$i]['quantity'];
                    $cartItem->save();
                    unset($items[$i]); // Xóa phần tử khỏi mảng
                    $items = array_values($items); // Sắp xếp lại chỉ mục mảng
                    break; // Thoát khỏi vòng lặp khi tìm thấy phần tử phù hợp
                }
            }
        }
        foreach ($items as $item) {
            $cart->items()->create(['product_id' => $item['productId'], 'quantity' => $item['quantity'], 'price' => $item['price']]);
        }

        return response()->json(['success' => empty($failMessage), 'message' => empty($failMessage) ? 'Items synced successfully' : $failMessage], Response::HTTP_OK);
    }

    public function getCartItems(Request $request)
    {
        $userId = $request->user()->id;
        $cart = $this->cart->firstOrCreateBy($userId);
        $items = $cart->items()->with('product')->get();
        $result = $items->map(function ($item) {
            $imageUrl = $item->product->getFirstImageUrl()->url;
            return ['price' => $item->price, 'quantity' => $item->quantity, 'productId' => $item->product_id, 'productName' => $item->product->name, 'size' => $item->product->name, 'imageUrl' => $imageUrl];
        });

        return response()->json(['success' => true, 'message' => 'get cart items successfully', 'items' => $result], Response::HTTP_OK);
    }

    public function addOrUpdate(Request $request)
    {
        $userId = $request->user()->id;
        $cart = $this->cart->firstOrCreateBy($userId);

        $isUpdate = false;
        $failMessage = '';
        $dataUpdate = $request->input('item');

        foreach ($cart->items()->with('product')->get() as $item) {
            if ($dataUpdate['productId'] == $item->product_id) {
                if (($dataUpdate['quantity'] + $item->quantity) > $item->product->quantity) {
                    $failMessage = 'Sản phẩm ' . $dataUpdate['productName'] . ' Trong kho không đủ';
                    $isUpdate = true;
                    break;
                }
                $item->quantity += $dataUpdate['quantity'];
                $item->save();
                $isUpdate = true;
                break;
            }
        }

        if (!$isUpdate) {
            $cart->items()->create(['quantity' => $dataUpdate['quantity'], 'price' => $dataUpdate['price'], 'product_id' => $dataUpdate['productId']]);
        }

        return response()->json(['success' => empty($failMessage), 'message' => empty($failMessage) ? 'Items update successfully' : $failMessage], Response::HTTP_OK);
    }

    public function syncItem(Request $request)
    {
        $userId = Auth::id();
        $cart = $this->cart->firstOrCreateBy($userId);
        $productId = $request->input('productId');
        $quantity = $request->input('quantity');

        $product = $this->product->find($productId);
        if ($product->quantity < $quantity) {
            return response()->json(['success' => false, 'message' => 'fail'], Response::HTTP_OK);
        }

        $cartItem = $cart->items()->where('product_id', '=', $productId)->first();
        $cartItem->quantity = $quantity;

        $cartItem->save();

        return response()->json(['success' => true, 'message' => 'get cart items successfully'], Response::HTTP_OK);
    }

    public function remmoveCart(string $productId)
    {
        $userId = Auth::id();
        $cart = $this->cart->firstOrCreateBy($userId);

        $cartItem = $cart->items()->where('product_id', '=', $productId);
        $cartItem->delete();

        return response()->json(['success' => true, 'message' => 'get cart items successfully'], Response::HTTP_OK);
    }
}
