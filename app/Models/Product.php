<?php

namespace App\Models;

use App\Traits\CreatedFromTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory , CreatedFromTrait;

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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function images()
    {
        return $this->morphMany(Images::class, 'imageable');
    }
}
