<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['product_count'] = Product::where('user_id',Auth::user()->id)->where('status','!=','Deleted')->get()->count();
        return view('home',$data);
    }
}
