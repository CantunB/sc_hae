<?php

namespace Smapac;

use Illuminate\Database\Eloquent\Model;

class AssignedRequesteds extends Model
{
    protected $table = 'assigned_requesteds';

    public function requisition()
    {
        return $this->belongsTo(Requisition::class,'requisition_id');
    }

    public function requested()
    {
        return $this->belongsTo(Requested::class);
    }

    public function area()
    {
        return $this->belongsTo(AssignedUserAreas::class);
    }
}
