<?php

namespace HAE;

use Illuminate\Database\Eloquent\Model;

class Coordination extends Model
{
    protected $table = 'coordinations';

    protected $fillable = [
        'name',
        'slug'
    ];
    public $timestamps = false;

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'assigned_areas');
    }

    public static function getDepartments($coordination){
        return  AssignedAreas::select('department_id')
                  ->where('coordination_id', $coordination)
                  ->orderBy('department_id','ASC')
                  ->get();
      }

}
