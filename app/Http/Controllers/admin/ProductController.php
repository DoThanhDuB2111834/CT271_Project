<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\product\CreateProduct;
use App\Http\Requests\product\UpdateProduct;
use App\Models\category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

        $dataCreate['imageUrls'] = $this->product->saveProductImage($request);
        $product = $this->product->create($dataCreate);
        foreach ($dataCreate['imageUrls'] as $imageUrl) {
            $product->Images()->create(['url' => $imageUrl]);
        }
        $product->categories()->attach($dataCreate['categories'] ?? []);

        return redirect()->route('product.index')->with(['message' => 'Create successfully', 'state' => 'success']);
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
        $product = $this->product->find($id);
        $highestCategories = $this->category->getHighestParent();

        return view('admin.product.edit', compact('id', 'product', 'highestCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProduct $request, string $id)
    {
        $product = $this->product->find($id);
        $dataUpdate = $request->all();
        $oldImageUrls = $request->input('old-images') ?? [];
        $deletedImageUrls = array_diff($product->Images()->pluck('url')->toArray(), $oldImageUrls);
        $dataUpdate['imageUrls'] = $this->product->updateProductImage($request, $oldImageUrls, $deletedImageUrls);
        $product->update($dataUpdate);
        // Xóa tất cả ảnh cũ
        $product->Images()->delete();
        $product->categories()->sync($dataUpdate['categories'] ?? []);
        foreach ($dataUpdate['imageUrls'] as $imageUrl) {
            $product->Images()->create(['url' => $imageUrl]);
        }

        return redirect()->route('product.index')->with(['message' => "Update product $id successfully", 'state' => 'success']);
    }

    /**
     * SOFT remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = $this->product->find($id);
        $product->delete();

        return redirect()->route('product.index')->with(['message' => "Delete product $id successfully", 'state' => 'success']);
    }

    public function find(string $productName)
    {
        $products = $this->product->where('name', 'like', "%$productName%")->get(['id', 'name', 'size', 'color', 'price']);
        $products->transform(function ($product) {
            $product->imageUrl = $product->getFirstImageUrl()->url; // Giả sử giảm giá 10%
            return $product;
        });

        return response()->json(['products' => $products, 'oke' => !$products->isEmpty()], Response::HTTP_OK);
    }
}
