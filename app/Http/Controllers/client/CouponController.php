<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\coupon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CouponController extends Controller
{
    public function getCoupon(string $id)
    {
        $coupon = coupon::find($id);
        $today = date('Y-m-d');

        if ($today >= $coupon->startedDate && $today <= $coupon->endedDate) {
            return response()->json(['success' => true, 'coupon' => $coupon], Response::HTTP_OK);
        } else {
            return response()->json(['success' => false, 'message' => 'coupon đã quá hạn sử dụng'], Response::HTTP_OK);
        }
    }
}
