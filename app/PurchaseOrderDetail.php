<?php

namespace Smapac;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderDetail extends Model
{
    protected $table = 'pur_order_details';

    public function provider()
    {
        return $this->belongsTo(Providers::class,'provider_id');
    }
    public function area()
    {
        return $this->belongsTo(AssignedAreas::class,'department_id','department_id');
    }
    public function requisition()
    {
        return $this->belongsTo(Requisition::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

}
