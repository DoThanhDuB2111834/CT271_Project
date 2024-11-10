<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\coupon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    public function getCoupon(string $id)
    {
        $coupon = coupon::find($id);
        $today = date('Y-m-d');
        $isUsed = false;
        if ($coupon == null) {
            return response()->json(['success' => false, 'message' => 'coupon không tồn tại'], Response::HTTP_OK);
        }

        foreach ($coupon->orders as $order) {
            if ($order->user_id == Auth::user()->id && $order->order_status->last()->status != 'Đã hủy') {
                $isUsed = true;
                break;
            }
        }
        if ($today < $coupon->startedDate || $today > $coupon->endedDate) {
            return response()->json(['success' => false, 'message' => 'coupon đã quá hạn sử dụng'], Response::HTTP_OK);
        } elseif ($isUsed) {
            return response()->json(['success' => false, 'message' => 'coupon đã hoặc đang được sử dụng, xin vui lòng kiểm tra lại'], Response::HTTP_OK);
        } else {
            return response()->json(['success' => true, 'coupon' => $coupon], Response::HTTP_OK);
        }
    }
}
