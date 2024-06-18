<?php

namespace App\Http\Controllers;
use App\Models\ProductModel;
use App\Models\ProductSizeModel;

use Cart;


use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function cart(Request $request)
    {
        $data['meta_title']='Cart';
        $data['meta_keyword']='';
        $data['meta_description']='';
        return view('payment.cart',$data);
    }
    public function cart_delete($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }
    public function update_cart(Request $request)
    {
        foreach ($request->cart as $cart) {
            Cart::update($cart['id'], array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $cart['qty']
                ),
            ));

        }
        return redirect()->back();

    }
    public function add_to_cart(Request $request){
            $getProduct = ProductModel::getSingle($request->product_id);
            $total= $getProduct->price;
            if(!empty($request->size_id)){
                $size_id = $request->size_id;
                $getSize = ProductSizeModel::getSingle($size_id);
                $size_price = !empty($getSize->price) ? $getSize->price : $total;
                $total  = $size_price + $total;
            }else{
                $size_id=0;
            }
            $color_id= !empty($request->color_id) ? $request->color_id:0;
            Cart::add([
                'id' => $getProduct->id,
                'name' => 'Product',
                'price' => $total,
                'quantity' => $request->qty,
                'attributes' => array(
                    'color_id' => $color_id,
                    'size_id' => $size_id,
                ),

            ]);
            return redirect()->back();
    }
}
