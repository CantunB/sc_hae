<?php

namespace Smapac;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name',
        'slug'
    ];

    public function area()
    {
        return $this->hasOne(AssignedAreas::class);
    }
}
