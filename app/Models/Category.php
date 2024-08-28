<?php

namespace App\Models;

use App\Traits\CreatedFromTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory , CreatedFromTrait;
    protected $fillable = [
        'name',
        'description',
        'category_id'
    ];
    protected $appends = ['created_from'];
    public function children(): HasMany
    {
        return $this->hasMany(
            Category::class,
            'category_id'
        )->with(
            'children' ,
            'products'
        );
    }
    /**
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);

    }
    public function images()
    {
        return $this->morphMany(images::class, 'imageable');
    }

}
