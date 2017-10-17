<?php

namespace ARShop\Http\Controllers;

use Illuminate\Http\Request;
use ARShop\Product;
use DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::all();
        return view('admin.index', compact('products'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'productname' => 'required',
            'productprice' => 'required|numeric|min:0',
            'productstock' => 'required|numeric|min:0',
            'productdesc' => 'required',
            'productimg' => 'required|image|mimes:jpeg,png,jpg|dimensions:width=500,height=500',
            'productthumb' => 'required|image|mimes:jpeg,png,jpg|dimensions:width=250,height=250',
        ]);

        $oriimg = $request->productname.'.'.$request->productimg->getClientOriginalExtension();
        $request->productimg->move(public_path('assets/products/img/'), $oriimg);

        $thumbimg = $request->productname.'.'.$request->productthumb->getClientOriginalExtension();
        $request->productthumb->move(public_path('assets/products/thumb/'), $thumbimg);

        Product::create([
            'product_name' => $request->productname,
            'product_price' => $request->productprice,
            'product_stock' => $request->productstock,
            'product_desc' => $request->productdesc,
            'product_img' => 'assets/products/img/'.$oriimg,
            'product_thumb' => 'assets/products/thumb/'.$thumbimg,
        ]);

        return redirect('/home')->with('alert-success', 'Product has been added.');
    }

    public function view($id) {
        $product = Product::find($id);
        if (!$product) abort(404);

        return view('admin.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        Product::findOrFail($id);

        $this->validate($request,[
            'productname' => 'required',
            'productprice' => 'required|numeric|min:0',
            'productstock' => 'required|numeric|min:0',
            'productdesc' => 'required',
            'productimg' => 'image|mimes:jpeg,png,jpg|dimensions:width=500,height=500',
            'productthumb' => 'image|mimes:jpeg,png,jpg|dimensions:width=250,height=250',
        ]);

        if ($request->hasfile('productimg')) $foto1_exist=1;
        else $foto1_exist=0;

        if ($request->hasfile('productthumb')) $foto2_exist=1;
        else $foto2_exist=0;

        if($foto1_exist==1) {
            $oriimg = $request->productname.'.'.$request->productimg->getClientOriginalExtension();
            $request->productimg->move(public_path('assets/products/img/'), $oriimg);
        }
        if($foto2_exist==1) {
            $thumbimg = $request->productname.'.'.$request->productthumb->getClientOriginalExtension();
            $request->productthumb->move(public_path('assets/products/thumb/'), $thumbimg);
        }

        $products = Product::find($id);
        $products->product_name     = $request->productname;
        $products->product_price    = $request->productprice;
        $products->product_stock    = $request->productstock;
        $products->product_desc     = $request->productdesc;
        if($foto1_exist==1) {
            $products->product_img   = 'assets/products/img/'.$oriimg;
        }
        if($foto2_exist==1) {
            $products->product_thumb   = 'assets/products/thumb/'.$thumbimg;
        }
        $products->save();

        return redirect('/home')->with('alert-success', 'Product has been updated.');
    }

    public function destroy($id)
    {
        Product::findOrFail($id);
        Product::find($id)->delete();

        return redirect('/home')->with('alert-success', 'Product has been deleted.');
    }
}
