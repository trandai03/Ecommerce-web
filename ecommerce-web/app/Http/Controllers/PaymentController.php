<?php

namespace App\Http\Controllers;
use App\Models\ProductModel;
use App\Models\ProductSizeModel;
use App\Models\DiscountCodeModel;
use App\Models\ShippingChargeModel;
use Cart;


use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        $data['meta_title']='Checkout';
        $data['meta_keyword']='';
        $data['meta_description']='';
        $data['getShipping'] = ShippingChargeModel::getRecordActive();
        return view('payment.checkout',$data);
    }

    public function apply_discount_code(Request $request){
        $getDiscount = DiscountCodeModel::CheckDiscount($request->discount_code);
        if(!empty($getDiscount)){
            $total = Cart::getSubTotal();
            if($getDiscount->type == 'Amount'){
                $discount_amount = $getDiscount->percent_amount;
                $payable_total = $total - $getDiscount->percent_amount;
            }
            else{
                $discount_amount = ($total * $getDiscount->percent_amount) / 100;
                $payable_total = $total - $discount_amount;
            }

            $json['status'] = true;
            $json['discount_amount'] = number_format($discount_amount, 2);
            $json['payable_total'] = $payable_total;
            $json['message'] = "Success";
        }
        else{
            $json['status'] = false;
            $json['discount_amount'] = '0.00';
            $json['payable_total'] = Cart::getSubTotal();
            $json['message'] = "Discount Code Invalid";
        }
        echo json_encode($json);
    }

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
            Cart::update($cart['id'], 
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $cart['qty']
                )
            ));

        }
        return redirect()->back();
    }

    public function add_to_cart(Request $request){
            $getProduct = ProductModel::getSingle($request->product_id);
            $total= $getProduct->price;
            $quantity = !empty($request->qty) ? $request->qty : 1;
            if(!empty($request->size_id)){
                $size_id = $request->size_id;
                $getSize = ProductSizeModel::getSingle($size_id);
                $size_price = !empty($getSize->price) ? $getSize->price : $total;
                $total  = $size_price + $total;
                $total *= $quantity;
            }else{
                $size_id=0;
            }
            $color_id= !empty($request->color_id) ? $request->color_id:0;
            
            Cart::add([
                'id' => $getProduct->id,
                'name' => 'Product',
                'price' => $total,
                'quantity' => $quantity,
                'attributes' => array(
                    'color_id' => $color_id,
                    'size_id' => $size_id,
                ),

            ]);
            return redirect()->back();
    }
}
