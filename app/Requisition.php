<?php

namespace HAE;

use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    protected $fillable = [
        'caption',
        'folio',
        'added_on',
        'management',
        'coordination_id',
        'department_id',
        'administrative_unit',
        'required_on',
        'issue',
        'remark',
        'dep_use'
    ];
    // public function getCreatedAtAttribute($value)
    // {
    //     return $value->format('M d Y');
    // }

    public  function asignado()
    {
        return $this->HasMany(AssignedRequisition::class);
    }
    public function area()
    {
        return $this->belongsToMany(AssignedUserAreas::class);
    }
    public function providers()
    {
        return $this->belongsTo(Quotesrequisitions::class);
    }

    public function requesteds()
    {
        return $this->belongsToMany(Requested::class, 'assigned_requesteds');
    }

    public function user()
    {
        return $this->belongsToMany(User::class,'assigned_requisitions');
    }

    public function compras()
    {
        return $this->hasMany( Purchase::class);
    }

    public function coordinations()
    {
        return $this->belongsTo(Coordination::class,'coordination_id');
    }

    public function departments()
    {
        return $this->belongsTo(Department::class,'department_id');
    }

}
