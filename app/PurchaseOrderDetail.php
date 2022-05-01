<?php

namespace HAE;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderDetail extends Model
{
    protected $table = 'pur_order_details';

    protected $fillable = [
        'order_folio',
        'analysis_folio',
        'coordination',
        'department',
        'unit_administrative',
        'provider_id',
        'department_id',
        'requisition_id'
    ];

    public function provider()
    {
        return $this->belongsTo(Providers::class,'provider_id');
    }
    public function requisition()
    {
        return $this->belongsTo(Requisition::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class,'department');
    }
    public function coordination()
    {
        return $this->belongsTo(Coordination::class,'coordination');
    }

}
