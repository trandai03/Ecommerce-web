<?php

namespace App\Http\Controllers;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use App\Models\ColorModel;
use App\Models\BrandModel;

class ProductController extends Controller
{
    public function getCategory($slug, $subslug='')
    {
        $getSubCategory= SubCategoryModel::getSingleSlug($subslug);
        $getCategory= CategoryModel::getSingleSlug($slug);
        $data['getColor'] =ColorModel::getRecordActive();
        $data['getBrand'] =BrandModel::getRecordActive();

        if(!empty($getCategory)  && !empty($getSubCategory)){
            $data['meta_title'] = $getSubCategory->meta_title;
            $data['meta_keywords'] =$getSubCategory->meta_keywords;
            $data['meta_description'] = $getSubCategory->meta_description;
            $data['getSubCategory'] = $getSubCategory;

            $data['getCategory'] = $getCategory;
            $data['getProduct']=ProductModel::getProduct($getCategory->id, $getSubCategory->id);
            $data['getSubCategoryFilter'] = SubCategoryModel::getRecordSubCategory($getCategory->id);

            return view('product.list',$data);
        }else if(!empty($getCategory)){
            $data['getSubCategoryFilter'] = SubCategoryModel::getRecordSubCategory($getCategory->id);

            $data['meta_title'] = $getCategory->meta_title;
            $data['meta_keywords'] =$getCategory->meta_keywords;
            $data['meta_description'] = $getCategory->meta_description;
            $data['getCategory'] = $getCategory;
            $data['getProduct']=ProductModel::getProduct( $getCategory->id);

            return view('product.list',$data);
        }else{
            abort(404);
        }
    }

    public function getFilterProductAjax(Request $request)
    {
        $getProduct = ProductModel::getProduct();
        dd($getProduct);
    }
}
