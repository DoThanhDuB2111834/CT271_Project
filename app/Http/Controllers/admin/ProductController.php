<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\product\CreateProduct;
use App\Models\category;
use App\Models\Product;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isFalse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $product;
    protected $category;

    public function __construct(Product $product, category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }
    public function index()
    {
        $products = $this->product->all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $highestCategories = $this->category->getHighestParent();
        return view('admin.product.create', compact('highestCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProduct $request)
    {
        $dataCreate = $request->all();

        $dataCreate['image'] = $this->product->saveImage($request);
        $product = $this->product->create($dataCreate);
        $product->Images()->create(['url' => $dataCreate['image']]);
        $product->categories()->attach($dataCreate['categories'] ?? []);

        return redirect()->route('product.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
