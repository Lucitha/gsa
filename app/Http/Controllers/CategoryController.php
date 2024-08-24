<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::all();
        return view('admin.categories',compact('categories'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd(request());
        
        $attributeNames  = [
            'category_name' => 'Category Name',
            'category_description' => 'Category Description',
        ];

        $validator = Validator::make($request->all(), [
            'category_name'  => 'required|string|min:3',
            'category_description'  => 'required|string|min:3',
        ]);

        $validator->setAttributeNames($attributeNames);

        if ($validator->fails())
        {
            return response()->json(['status'=>0,'errors'=>$validator->errors()]);
        }


        $categorie = new Category();
        $categorie->category_name = request('category_name');
        $categorie->category_description = request('category_description');
        $categorie->category_flag=1;
        $categorie->created_by =session()->get('user')->id;
        if($categorie->save()){
            return back()->with('success',"Catégorie créée avec succès");
            // return response()->json(['status'=>1,'message'=>'Catégorie créée avec succès','categorie'=>$categorie]);
        }else{
            return back()->with('error',"Echec d'enregistrement");
            // return response()->json(['status'=>0,'message'=>'Une erreur est survenue réessayer']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateStatut($id)
    {
        // dd($id);
        $category=Category::where('id',$id)->first();
        if($category->category_flag==1){
            $category->category_flag=0;
        }else{
            $category->category_flag=1;
        }
        $category->save();
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
