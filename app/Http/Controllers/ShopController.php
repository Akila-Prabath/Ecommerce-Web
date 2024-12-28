<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request){
        $size=$request->query('size') ? $request->query('size') : 12; //pass the value as given size , otherwise set it as default value.
        $o_column="";
        $o_order ="";
        $order =$request->query('order') ? $request->query('order') :-1;
        $f_brands = $request->query('brands','');
        switch($order){
            case 1:
                $o_column='created_at';
                $o_order='DESC';
                break;
            
            case 2:
                $o_column='created_at';
                $o_order='ASc';
                break;
            
            case 3:
               $o_column='regular_price';
               $o_order='ASC';
               break;

            case 4:
               $o_column='regular_price';
               $o_order='DESC';
               break;

            default:
                $o_column='regular_price';
                $o_order='DESC';

        }
        $brands = Brand::orderBy('name','ASC')->get();
        $products = Product::where (function($query) use($f_brands){
            $query->whereIn('brand_id',explode(',',$f_brands))->orWhereRaw("'".$f_brands."'=''");
        })
        ->orderBy($o_column,$o_order)->paginate($size);
        return view('shop', compact('products','size','order','brands','f_brands'));
    }

    public function product_details($product_slug){
        $product = Product::where('slug',$product_slug)->first();
        $rproducts = Product::where('slug','<>',$product_slug)->get()->take(8);
        return view('details',compact('product','rproducts'));
    }
}
