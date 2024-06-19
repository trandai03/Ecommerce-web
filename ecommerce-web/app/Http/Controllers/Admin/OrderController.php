<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderModel;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function list( )
    {
        $data['getRecord'] = OrderModel::getRecord();
        $data['header_title'] ='Order';
        return view('admin.order.list',$data);
    }
}
