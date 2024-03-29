<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    // protected $table ="users";
    // protected $primary_key="id";
    // protected $fillable = [
    //     'id',
    //     'user_name',
    //     'user_surname',
    //     'user_email',
    //     'user_contact',
    //     'user_flag',
    //     'user_addresse',
    //     'user_gender',
    //     'user_function',
    //     'user_reference',
    //     'user_description',
    //     'user_password',
    //     'role_id',
    // ];

    // public function users()
    // {
    //     return $this->belongsTo(Role::class);
    // }
}
