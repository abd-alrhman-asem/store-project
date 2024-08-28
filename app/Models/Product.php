<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // The attributes that are mass assignable.
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'weight',
        'category_id',
        'status',
    ];
    protected $appends = ['created_from'];

//    public function category()
//    {
//        return $this->belongsTo(Category::class);
//    }
}
