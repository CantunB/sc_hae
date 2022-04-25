<?php

namespace HAE;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $table = 'purchase_orders';


    public function pur_order_detail()
    {
        return $this->belongsToMany(PurchaseOrderDetail::class,'purchase_orders','pur_order_details_id','pur_order_details_id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function detail()
    {
        return $this->belongsTo(PurchaseOrderDetail::class,'pur_order_details_id');
    }
    public function material()
    {
        return $this->belongsTo(PurchaseOrderMaterial::class,'pur_order_material_id');
    }
    public function feauture()
    {
        return $this->belongsTo(PurchaseOrderFeauture::class,'pur_order_features_id');
    }
    public function purchasorder()
    {
        return $this->belongsTo(PurchaseOrder::class,'department_id','department_id');
    }

    public function purchaseorderid()
    {
        return $this->belongsTo(PurchaseOrder::class,'pur_order_details_id','pur_order_details_id');
    }

    public function purchase()
    {
        return $this->hasMany(Purchase::class,'purchase_order_id');
    }
}
