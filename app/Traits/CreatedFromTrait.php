<?php

namespace App\Traits;

use Carbon\Carbon;

trait CreatedFromTrait
{
    public function getCreatedFromAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }
}
