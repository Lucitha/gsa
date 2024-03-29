<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Supplier;
class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers=Supplier::all();
        return view('admin.suppliers',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add_supplier');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd(request());
        $supplier=\DB:: table ('suppliers')
        ->insert([
            'supplier_name'=>request('supplier_name'),
            'supplier_surname'=>request('supplier_surname'),
            'supplier_reference'=>request('supplier_references'),
            'supplier_phone'=>request('supplier_phone'),
            'supplier_address'=>request('supplier_address'),
            'supplier_email'=>request('supplier_email'),
            'supplier_description'=>request('supplier_description'),
            'supplier_flag'=>1,
            'created_by'=>session()->get('user')->id
        ]);
        if($supplier){

            return redirect('/suppliers');
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
