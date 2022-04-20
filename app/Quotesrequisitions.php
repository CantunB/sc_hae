<?php

namespace Smapac;

use Illuminate\Database\Eloquent\Model;

class Quotesrequisitions extends Model
{
    protected $fillable = [
        'department_id',
        'requisition_id',
        'provider_id',
        'quote_file',
    ];

    public  function requisition()
    {
        return $this->belongsTo(Requisition::class);
    }
    public function provider()
    {
        return $this->belongsTo(Providers::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function purchase()
    {
        return $this->belongsTo(Purchase::class, 'requisition_id');
    }
}
