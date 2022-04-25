<?php

namespace HAE;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'invoice_file',
        ];
    public function purchasorder()
    {
        return $this->belongsTo(PurchaseOrder::class,'department_id','department_id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function order()
    {
        return $this->belongsTo(PurchaseOrder::class,'purchase_order_id');
    }
    public function invoice()
    {
        return $this->hasMany(PurchaseInvoice::class);
    }
}
