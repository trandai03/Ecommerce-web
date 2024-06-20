<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\OrderModel;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function dashboard(){
        $data['meta_title'] = 'Dashboard';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        $data['TotalOrder'] = OrderModel::getTotalOrderUser(Auth::user()->id);
        $data['TotalTodayOrder'] = OrderModel::getTotalTodayOrderUser(Auth::user()->id);
        $data['TotalAmount'] = OrderModel::getTotalAmountUser(Auth::user()->id);
        $data['TotalTodayAmount'] = OrderModel::getTotalTodayAmountUser(Auth::user()->id);

        $data['TotalPending'] = OrderModel::getTotalStatusUser(Auth::user()->id,0);
        $data['TotalInProgree'] = OrderModel::getTotalStatusUser(Auth::user()->id,1);
        $data['TotalCompleted'] = OrderModel::getTotalStatusUser(Auth::user()->id,3);
        $data['TotalCanceled'] = OrderModel::getTotalStatusUser(Auth::user()->id,4);
        return view('user.dashboard', $data);
    }

    public function orders(){
        $data['getOrders'] = OrderModel::getRecordUser(Auth::user()->id);
        $data['meta_title'] = 'Orders';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        return view('user.orders', $data);
    }

    public function edit_profile(){
        $data['meta_title'] = 'Edit Profile';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        return view('user.edit_profile', $data);
    }
    public function change_password(){
        $data['meta_title'] = 'Change Password';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        return view('user.change_password', $data);
    }

}
