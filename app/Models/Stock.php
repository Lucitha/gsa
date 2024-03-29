<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }
    
    public function products()
    {
        return $this->belongsTo(Supplier::class);
    }

}
