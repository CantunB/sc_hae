<?php

namespace Smapac;

use Illuminate\Database\Eloquent\Model;

class PurchaseInvoice extends Model
{
  protected $table = 'purchase_invoices';

  public function department()
  {
      return $this->belongsTo(Department::class);
  }
  public function purchaseinvoice()
  {
      return $this->belongsTo(PurchaseInvoice::class,'purchase_id','purchase_id');
  }
  public function purchaseautorize()
  {
      return $this->belongsTo(Purchase::class,'purchase_id');
  }
}
