<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'description'
    ];
    public function users()
    {
        return $this->belongsToMany('App\Models\User','product_users','product_id','user_id');
    }
}
