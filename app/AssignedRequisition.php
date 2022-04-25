<?php

namespace HAE;

use Illuminate\Database\Eloquent\Model;

class AssignedRequisition extends Model
{
    protected $table = 'assigned_requisitions';

    public function areas()
    {
        return $this->hasMany(AssignedUserAreas::class);
    }

    public function requisition()
    {
        return $this->belongsTo(Requisition::class);
    }
    public function providers()
    {
        return $this->belongsTo(Providers::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function requested()
    {
        return $this->hasMany(AssignedRequesteds::class,'requisition_id','requisition_id')
            ->orderBy('id','DESC');
    }


}
