<?php

namespace App\Http\Controllers;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $attributeNames  = [
            request('warehouse_name')      => 'Warehouse name',
            request('warehouse_description')   => 'Warehouse description'
        ];
        
        $validator = Validator::make($request->all(), [
            'warehouse_name'     => 'required|string|min:3',
            'warehouse_description'  => 'required|string|min:3'
        ]);
     
        if ($validator->fails())
        {
            return response()->json(['status'=>0,'errors'=>$validator->errors()]);
        }else{
            Warehouse::create([
                'warehouse_name'=>$request->warehouse_name,
                'warehouse_description'=>$request->warehouse_description,
                'warehouse_flag'=>1,
                'created_by'=>session()->get('user')->id

            ]);
        }
        // dd
        return back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        

    }

    public function list()
    {
        //
        $warehouses=Warehouse::select('*')->get();
        // dd($warehouses);

        return view('admin.warehouses',compact('warehouses'));

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