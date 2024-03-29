<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
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
    public function create()
    {
        //
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

    /**
     * login
     */
    public function login(Request $request)
    {
        $attributeNames  = [
            request('admin_email')      => 'Email',
            request('admin_pass')   => 'Mot de passe'
        ];
        
        $validator = Validator::make($request->all(), [
            'admin_email'     => 'required|email',
            'admin_pass'  => 'required|string|min:8'
        ]);
        
        $user_mail=$request->admin_email;
      
        // dd(request());
        $validator->setAttributeNames($attributeNames);
        $user=User::where('user_email',$user_mail)->first();
        // dd($user->user_email);
        if ($validator->fails())
        {
            return response()->json(['status'=>0,'errors'=>$validator->errors()]);
        }else{
            if(!$user){
            }elseif(!password_verify($request->admin_pass,$user->user_password)){
                
                return back()->with('info','Identifiants incorrects');;
            }else{
                session()->put('user',$user);
                session()->save();
                // session()->put('id',$user->id);
                // session()->put('user_email',$user->user_email);
                // session()->put('user_name',$user->user_name);
                // session()->put('user_surname',$user->user_surname);
                // session()->put('role_id',$user->role_id);
                return view('/admin/dashboard')->with('info','youpiii');

            }

            $login = request('admin_email');
            $pwd = request('admin_password');
            return response()->json(['status'=>0,'message'=>request('admin_email')]);
        }

        
    }

    function logout()
    {
        session()->forget('user');
        session()->save();
        return redirect('/admin');
    }
    
}
