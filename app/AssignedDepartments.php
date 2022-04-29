<?php

namespace HAE;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignedDepartments extends Model
{
    use HasFactory;
    protected $table = 'coordination_department';

    protected $fillable = [
        'coordination_id',
        'department_id'
    ];
    public $timestamps = false;

    public function departments()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function coordinations()
    {
        return $this->belongsTo(Coordination::class, 'coordination_id');
    }


}
