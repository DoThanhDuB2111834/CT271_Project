<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $coupon;

    public function __construct(coupon $coupon)
    {
        $this->coupon = $coupon;
    }

    public function index()
    {
        $coupons = $this->coupon->all();

        return view('admin.coupon.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataCreate = $request->validate([
            'value' => 'required',
            'startedDate' => 'required|date|before:endedDate',
            'endedDate' => 'required|date|after:startedDate',
        ]);

        $this->coupon->create($dataCreate);

        return redirect()->route('coupon.index')->with(['message' => 'Create successfully', 'state' => 'success']);
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
        $coupon = $this->coupon->findOrFail($id);

        return view('admin.coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $coupon = $this->coupon->findOrFail($id);
        $dataUpdate = $request->validate([
            'value' => 'required',
            'startedDate' => 'required|date|before:endedDate',
            'endedDate' => 'required|date|after:startedDate',
        ]);

        $coupon->update($dataUpdate);

        return redirect()->route('coupon.index')->with(['message' => 'Update successfully', 'state' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coupon = $this->coupon->findOrFail($id);

        $coupon->delete();

        return redirect()->route('coupon.index')->with(['message' => 'Delete successfully', 'state' => 'success']);
    }
}
