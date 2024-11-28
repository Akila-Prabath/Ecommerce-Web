<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;


class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function brands()
    {
        $brands = Brand::orderBy('id','DESC')->paginate(10);
        return view('admin.brands',compact('brands'));
    }
}
