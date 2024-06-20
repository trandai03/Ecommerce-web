<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderModel;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard(){
        $data['TotalOrder'] = OrderModel::getTotalOrder();
        $data['TotalTodayOrder'] = OrderModel::getTotalTodayOrder();
        $data['TotalAmount'] = OrderModel::getTotalAmount();
        $data['TotalTodayAmount'] = OrderModel::getTotalTodayAmount();
        $data['TotalCustomer'] = User::getTotalCustomer();
        $data['TotalTodayCustomer'] = User::getTotalTodayCustomer();
        $data['getLatestOrders'] = OrderModel::getLatestOrders();
        $data['header_title'] = "Dashboard";
        return view('admin.dashboard', $data);
    }
}
