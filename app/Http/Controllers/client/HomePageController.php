<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\discount;
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

    public function showProductDetailPage(string $id)
    {
        $product = $this->product->findOrFail($id);
        $categories = $product->categories;
        $recommendedProducts = [];
        foreach ($categories as $category) {
            foreach ($category->products as $recommendedProduct) {
                if (count($recommendedProducts) >= 4)
                    break;
                if ($recommendedProduct->id == $product->id)
                    continue;
                array_push($recommendedProducts, $recommendedProduct);
            }
        }

        $recommendedProducts = array_unique($recommendedProducts);

        return view('client.ProductDetailPage', compact('product', 'recommendedProducts'));
    }

    public function showDiscountProduct()
    {
        $today = date('Y-m-d');
        $discounts = Discount::where('startedDate', '<=', $today)->where('endeddate', '>=', $today)->get();
        $products = [];
        function addElementToArray(&$array, $element)
        {
            if (!in_array($element, $array)) {
                $array[] = $element;
            }
        }

        foreach ($discounts as $discount) {
            foreach ($discount->products as $product) {
                addElementToArray($products, $product);
            }
        }

        return view('client.DiscountProductOverviewPage', compact('products'));
    }
}
