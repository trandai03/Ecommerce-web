<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Str;
use App\Models\ProductModel;
use Auth;
class ProductController extends Controller
{
    public function list( )
    {
        $data['getRecord'] = ProductModel::getRecord();
        $data['header_title'] ='Product';
        return view('admin.product.list',$data);
    }

    public function add( ){
        $data['header_title'] ='Add New Product';
        return view('admin.product.add',$data);
    }

    public function insert(Request $request){
        $product = new ProductModel;
        $title= trim($request->title);
        $slug = Str::slug($request->title,"-");
        $product->title = $title;
        $product->created_by= Auth::user()->id;
        $product->save();

        $checkSlug=ProductModel::checkSlug($slug);
        if(empty($checkSlug)){
            $product ->slug =$slug;
            $product->save();

        }else{
            $new_slug= $slug .'-' . $product->id;
            $product->slug=$new_slug;
            $product->save();


        }
        return redirect('admin/product/edit'.$product->id);
    }

    public function edit( $product_id ){

        $data['header_title'] ='Edit Product';
        $product=ProductModel::getSingle($product_id);
        if(!empty($product)){
            $data ['product'] =$product;
            $data['header_title'] ='Edit Product';
            return view('admin.product.edit',$data);

        }
    }
}
