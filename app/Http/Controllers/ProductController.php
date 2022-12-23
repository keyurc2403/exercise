<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Auth;

class ProductController extends Controller
{
    
    public function index(Request $request)
    {
        $product = Product::where('user_id',Auth::user()->id)->where('status','!=','Deleted')->paginate(10);
        $product->appends($request->all())->render();
        $data['products'] = $product;
        return view('product.index',$data);
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'name'=>'required',
            'price'=>'required'
        ]);

        $fileName = null;
        if($request->file('product_image')){
            $fileName = time().'_'.rand(100,999).".".$request->product_image->extension();
            $path="/upload/product/".$fileName;
            $public_path = public_path('/upload/product/');
            $request->product_image->move($public_path,$fileName);
        }

        $product = new Product;
        $product->user_id = Auth::user()->id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->upc = isset($request->upc) ? $request->upc:null;
        $product->product_image = $fileName;
        $product->status = $request->status;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }

    public function show($id)
    {
        $data['product_details'] = Product::where('id',$id)->first();
        return view('product.show',$data);
    }

    public function edit($id)
    {
        $data['product_details'] = Product::where('id',$id)->first();
        return view('product.edit',$data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'price'=>'required'
        ]);

        $fileName = $request->hidden_product_image;
        if($request->file('product_image')){
            $fileName = time().'_'.rand(100,999).".".$request->product_image->extension();
            $path="/upload/product/".$fileName;
            $public_path = public_path('/upload/product/');
            $request->product_image->move($public_path,$fileName);
        }

        $product = Product::find($id);
        $product->user_id = Auth::user()->id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->upc = isset($request->upc) ? $request->upc:null;
        $product->product_image = $fileName;
        $product->status = $request->status;
        $product->save(); 

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        Product::where('id',$id)->update(['status' => 'Deleted']);
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
