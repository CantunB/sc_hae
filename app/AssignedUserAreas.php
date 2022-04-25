<?php

namespace HAE;

use Illuminate\Database\Eloquent\Model;

class AssignedUserAreas extends Model
{
    protected $table = 'assigned_user_areas';

    protected $fillable = [
        'user_id',
        'areas_id'
    ];

    public function area()
    {
        return $this->belongsToMany(AssignedAreas::class, 'areas_id');
    }

    public function areas()
    {
        return $this->belongsTo(AssignedAreas::class, 'areas_id');
    }


    public function departments()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function coordinations()
    {
        return $this->belongsTo(Coordination::class, 'coordination_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function usuario()
    {
        return $this->belongsToMany(User::class,'users');
    }
}
