<?php

namespace HAE;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';

    protected $fillable = [
        'name',
        'slug'
    ];

    public $timestamps = false;
    protected $appends = ['fullname'];

    public function getFullNameAttribute()
    {
        return "{$this->name} ({$this->slug})";
    }

    public function area()
    {
        return $this->hasOne(AssignedAreas::class);
    }
}
