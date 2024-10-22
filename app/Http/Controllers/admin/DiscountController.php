<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\discount\CreateDiscount;
use App\Http\Requests\discount\UpdateDiscount;
use App\Models\discount;
use App\Models\Product;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $product;
    protected $discount;

    public function __construct(discount $discount, Product $product)
    {
        $this->discount = $discount;
        $this->product = $product;
    }

    public function index()
    {
        $discounts = $this->discount->all();
        return view('admin.discount.index', compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.discount.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateDiscount $request)
    {
        $dateCreate = $request->except(['product_ids']);
        $discount = $this->discount->create($dateCreate);

        $products_ids = $request->input('product_ids');
        $discount->products()->attach($products_ids ?? []);

        return redirect()->route('discount.index')->with(['message' => 'Create successfully', 'state' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $discount = $this->discount->findOrFail($id);
        $product_infors = [];
        foreach ($discount->products()->get() as $item) {
            array_push($product_infors, collect(['id' => $item->id, 'name' => $item->name, 'size' => $item->size, 'color' => $item->color, 'price' => $item->price]));
        }

        return view('admin.discount.edit', compact('discount', 'product_infors'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $discount = $this->discount->findOrFail($id);
        $product_infors = [];
        foreach ($discount->products()->get() as $item) {
            array_push($product_infors, collect(['id' => $item->id, 'name' => $item->name, 'size' => $item->size, 'color' => $item->color, 'price' => $item->price]));
        }

        return view('admin.discount.edit', compact('discount', 'product_infors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDiscount $request, string $id)
    {
        $dataUpdate = $request->except(['product_ids']);
        $discount = $this->discount->findOrFail($id);

        $discount->update($dataUpdate);

        $product_ids = $request->input('product_ids') ?? [];

        $discount->products()->sync($product_ids);

        return redirect()->route('discount.index')->with(['message' => 'Update successfully', 'state' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $discount = $this->discount->findOrFail($id);
        $discount->delete();

        return redirect()->route('discount.index')->with(['message' => 'Delete successfully', 'state' => 'success']);
    }
}
