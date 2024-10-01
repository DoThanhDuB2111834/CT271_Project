<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\goods_receipt\CreateGoodsReceipt;
use App\Models\goods_receipt;
use App\Models\Product;
use App\Models\supplier;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $goods_receipt;

    protected $suppliers;

    protected $product;

    public function __construct(goods_receipt $goods_receipt, supplier $supplier, Product $product)
    {
        $this->goods_receipt = $goods_receipt;
        $this->suppliers = $supplier;
        $this->product = $product;
    }

    public function index()
    {
        $goods_receipts = $this->goods_receipt->latest()->get();

        return view('admin.goods_receipt.index', compact('goods_receipts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = $this->suppliers->latest()->get();
        return view('admin.goods_receipt.create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateGoodsReceipt $request)
    {
        $dataCreate = $request->except(['product_ids', 'product_quantity', 'product_price']);
        $dataCreate['total_price'] = 0;
        $goods_receipt = $this->goods_receipt->create($dataCreate);
        // $goods_receipt->supplier()->create(['supplier_id' => $dataCreate['supplier']]);

        $products_id = $request->input('product_ids');
        $products_quantity = $request->input('product_quantity');
        $products_price = $request->input('product_price');

        $total_price = 0;
        for ($i = 0; $i < count($products_id); $i++) {
            $product = $this->product->find($products_id[$i]);
            $goods_receipt->products()->save($product, ['quantity' => $products_quantity[$i], 'price' => $products_price[$i]]);
            $total_price += $products_price[$i] * $products_quantity[$i];
        }

        $goods_receipt->update(['total_price' => $total_price]);

        return redirect()->route('goods_receipt.index')->with(['message' => 'Create successfully', 'state' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $goods_receipt = $this->goods_receipt->find($id);
        $suppliers = $this->suppliers->latest()->get();
        $product_infors = [];
        foreach ($goods_receipt->products()->get() as $item) {
            array_push($product_infors, collect(['id' => $item->id, 'name' => $item->name, 'size' => $item->size, 'color' => $item->color, 'quantity' => $item->pivot->quantity, 'price' => $item->pivot->price]));
        }
        return view('admin.goods_receipt.edit', compact('goods_receipt', 'suppliers', 'product_infors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $goods_receipt = $this->goods_receipt->find($id);
        $dataUpdate = $request->except(['product_ids', 'product_quantity', 'product_price']);
        $goods_receipt->update($dataUpdate);

        $products_id = $request->input('product_ids');
        $products_quantity = $request->input('product_quantity');
        $products_price = $request->input('product_price');

        // Remove all in goods_receipt_detail table
        $goods_receipt->products()->sync([]);
        $total_price = 0;
        for ($i = 0; $i < count($products_id); $i++) {
            $product = $this->product->find($products_id[$i]);
            $goods_receipt->products()->save($product, ['quantity' => $products_quantity[$i], 'price' => $products_price[$i]]);
            $total_price += $products_price[$i] * $products_quantity[$i];
        }

        $goods_receipt->update(['total_price' => $total_price]);

        return redirect()->route('goods_receipt.index')->with(['message' => 'Update successfully', 'state' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $goods_receipt = $this->goods_receipt->findOrFail($id);
        $goods_receipt->delete();

        return redirect()->route('goods_receipt.index')->with(['message' => 'Delete successfully', 'state' => 'success']);
    }
}
