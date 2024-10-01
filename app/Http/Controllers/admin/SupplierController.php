<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supplier\CreateaSupplier;
use App\Http\Requests\Supplier\UpdateSupplier;
use App\Models\supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $supplier;

    public function __construct(supplier $supplier)
    {
        $this->supplier = $supplier;
    }

    public function index()
    {
        $suppliers = $this->supplier->latest()->get();

        return view('admin.supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateaSupplier $request)
    {
        $dataCreate = $request->all();

        $this->supplier->create($dataCreate);

        return redirect()->route('supplier.index')->with(['message' => 'Create successfully', 'state' => 'success']);
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
        $supplier = $this->supplier->find($id);

        return view('admin.supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplier $request, string $id)
    {
        $supplier = $this->supplier->findOrFail($id);
        $dataUpdate = $request->all();
        $supplier->update($dataUpdate);

        return redirect()->route('supplier.index')->with(['message' => 'Update successfully', 'state' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = $this->supplier->findOrFail($id);

        $supplier->delete();
        return redirect()->route('supplier.index')->with(['message' => 'Delete successfully', 'state' => 'success']);
    }
}
