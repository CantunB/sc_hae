<?php

namespace HAE;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignedCoordinations extends Model
{
    use HasFactory;
    protected $table = 'dependency_coordination';

    protected $fillable = [
        'dependency_id',
        'coordination_id'
    ];
    public $timestamps = false;
    protected $appends = ['dependency','coordination'];

    public function getDependencyAttribute()
    {
        return $this->dependencies->fullname;
    }
    public function getCoordinationAttribute()
    {
        return $this->coordinations->fullname;
    }

    public function dependencies()
    {
        return $this->belongsTo(Dependency::class, 'dependency_id');
    }

    public function coordinations()
    {
        return $this->belongsTo(Coordination::class, 'coordination_id');
    }
}
