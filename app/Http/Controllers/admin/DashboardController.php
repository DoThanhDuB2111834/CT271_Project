<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\goods_receipt;
use App\Models\order;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_receipt_price = goods_receipt::sum('total_price');
        $user_number = User::count();
        $total_order_sales_this_week = order::getTotalPriceInThisWeek();
        $orderNumber = order::count();

        $monthlyIncome = Order::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(total_price) as total')->groupBy('year', 'month')->orderBy('year', 'desc')->orderBy('month', 'desc')->get();

        $dailyIncome = Order::selectRaw('DATE(created_at) as date, SUM(total_price) as total')->groupBy('date')->orderBy('date', 'desc')->get();

        return view('admin.dashboard.index', compact('total_receipt_price', 'user_number', 'total_order_sales_this_week', 'orderNumber', 'monthlyIncome', 'dailyIncome'));
    }
}
