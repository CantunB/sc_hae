<?php

namespace Smapac;

use Illuminate\Database\Eloquent\Model;

class AssignedAreas extends Model
{
    protected $table = 'assigned_areas';

    protected $fillable = [
        'slug'
    ];

    public function departments()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function coordinations()
    {
        return $this->belongsTo(Coordination::class, 'coordination_id');
    }

    public function area()
    {
        return $this->belongsToMany(AssignedUserAreas::class);
    }

    public function userareas()
    {
        return $this->hasMany(AssignedUserAreas::class,'areas_id');
    }
    public static function getDepartments($coor){
        return  AssignedAreas::select('department_id')
                  ->where('coordination_id', $coor)
                  ->groupBy('department_id')
                  ->orderBy('department_id','DESC')
                  ->get();
      }


}
