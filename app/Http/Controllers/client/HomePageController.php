<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    protected $product;
    protected $category;

    public function __construct(Product $product, category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }

    public function index()
    {
        $newProducts = $this->product->orderBy('created_at', 'desc')->take(4)->get();
        $products = $this->product->paginate(8);

        return view('client.HomePage', compact('newProducts', 'products'));
    }

    public function showCategoryDetailPage(string $categoryName)
    {
        $category = $this->category->where('name', '=', "$categoryName")->first();

        $products = $category->products()->paginate(6);

        return view('client.ProductCategoryPage', compact('products', 'category'));
    }
}
