<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;

class ProductController extends Controller
{
    public function getCategory($slug, $subslug='')
    {


        $getSubCategory= SubCategoryModel::getSingleSlug($subslug);
        $getCategory= CategoryModel::getSingleSlug($slug);
        if(!empty($getCategory)  && !empty($getSubCategory)){
            $data['meta_title'] = $getSubCategory->meta_title;
            $data['meta_keywords'] =$getSubCategory->meta_keywords;
            $data['meta_description'] = $getSubCategory->meta_description;
            $data['getSubCategory'] = $getSubCategory;

            $data['getCategory'] = $getCategory;
            return view('product.list',$data);
        }else if(!empty($getCategory)){
            $data['meta_title'] = $getCategory->meta_title;
            $data['meta_keywords'] =$getCategory->meta_keywords;
            $data['meta_description'] = $getCategory->meta_description;
            $data['getCategory'] = $getCategory;
            return view('product.list',$data);
        }else{
            abort(404);
        }
    }
}
