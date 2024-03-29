<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Warehouse;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Product;


class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stocks= Stock::all();
        return view('admin.stock_history',compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories= Category::select('*')->where('category_flag',1)->get();
        $warehouses= Warehouse::select('*')->where('warehouse_flag',1)->get();
        $suppliers= Supplier::select('*')->where('supplier_flag',1)->get();
        return view('admin.add_stock',compact('categories','warehouses','suppliers'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        dd($request);
        $product=\DB::table('product_details')
        ->select('*')
        ->where([['product_details.product_id',$request->product],['product_details.warehouse_id',$request->warehouse]])
        ->first();
        Stock::create([
            'stock_reference'=>$request->reference,
            'stock_quantity'=>$request->quantity,
            'stock_description'=>$request->description,
            'stock_type'=>$request->type,
            'supplier_id'=>$request->supplier,
            'warehouse_id'=>$request->warehouse,
            'product_id'=>$request->product,
            'created_by'=>session()->get('user')->id

        ]);
       
        if($product){
            $increment=$request->quantity + $product->product_quantity;
            $product->product_quantity = $increment;
            $product->save();
        }else{
            $insert=\DB:: table ('product_details')
            ->insert([
                'supplier_name'=>request('supplier_name'),
                'product_quantity'=>request('quantity'),
                'product_id'=>request('product'),
                'warehouse_id'=>request('warehouse'),
                'created_by'=>session()->get('user')->id
            ]);
        }
        
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
