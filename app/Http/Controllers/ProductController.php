<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();
        return view('admin.list_products',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::select('*')->where('category_flag',1)->get();
        return view('admin.add_product',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd(request());
        $attributeNames  = [
            request('product_name')      => 'Product name',
            request('product_description')   => 'Product description',
            request('product_alert')   => 'Product alert',
            request('product_category')   => 'Product category',
        ];
        
        $validator = Validator::make($request->all(), [
            'product_name'     => 'required|string|min:3',
            'product_description'  => 'required|string|min:3',
            'product_alert'  => 'required',
            'product_category'  => 'required',
        ]);
        $product = new Product();
        $product->product_name = request('product_name');
        $product->product_description = request('product_description');
        $product->product_alert=request('product_alert');
        $product->product_flag=1;
        $product->category_id=request('product_category');
        $product->created_by =session()->get('user')->id;
        if($product->save()){
            return redirect('/products')->with('success',"Produit créée avec succès");
            //
        }else{
            return back()->with('error',"Echec d'enregistrement");
        } 
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateStatut($id)
    {
        // dd($id);
        $product=Product::where('id',$id)->first();
        if($product->product_flag==1){
            $product->product_flag=0;
        }else{
            $product->product_flag=1;
        }
        $product->save();
        return back();
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
