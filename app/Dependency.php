<?php

namespace HAE;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependency extends Model
{
    use HasFactory;

    protected $table = 'dependencies';

    protected $fillable = [
        'name',
        'slug',
        'colony_dependency',
        'address_dependency',
        'telephone_dependency',
        'email_dependency',
        'status'
    ];

    public $timestamps = false;
    protected $appends = ['fullname'];

    public function getFullNameAttribute()
    {
        return "{$this->name} ({$this->slug})";
    }

    public function coordinations()
    {
        return $this->belongsToMany(Coordination::class, 'dependency_relation');
    }

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'dependency_relation');
    }
}
