<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $category;

    public function __construct(category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hightestParent = $this->category->getHighestParent();
        return view('admin.category.create', compact('hightestParent'));
        // $category = $this->category->getHighestParent();

        // foreach ($hightParent as $item) {
        //     echo ($item . '\n');
        // }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataCreate = $request->all();
        $category = $this->category->create($dataCreate);
        $category->parent()->sync($dataCreate['parentCategorys'] ?? []);
        $category->children()->sync($dataCreate['chidrenCategorys'] ?? []);

        return redirect()->route('category.index')->with(['message' => 'Create successfully', 'state' => 'success']);
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
        $category = $this->category->find($id);
        $hightestParent = $this->category->getHighestParent();
        return view('admin.category.edit', compact('category', 'hightestParent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataUpdate = $request->all();
        $category = $this->category->find($id);
        $category->update(['name' => $dataUpdate['name']]);

        $category->parent()->sync($dataUpdate['parentCategorys'] ?? []);
        $category->children()->sync($dataUpdate['chidrenCategorys'] ?? []);

        return redirect()->route('category.index')->with(['message' => 'Update successfully', 'state' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = $this->category->find($id);
        $category->delete();

        return redirect()->route('category.index')->with(['message' => 'Delete successfully', 'state' => 'success']);
    }

}
