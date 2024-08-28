<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class images extends Model
{
    use HasFactory;

    protected $fillable = ['path'];

    // Polymorphic relationship
    public function imageable()
    {
        return $this->morphTo();
    }
}
