<?php

namespace Smapac;

use Illuminate\Database\Eloquent\Model;

class Providers extends Model
{
    protected $fillable = [
        'name',
        'email',
        'rfc',
        'address',
        'phone',
        'website',
        'description',
        'provider_file',
    ];

    public static function CountCot($provider)
    {
        return  Quotesrequisitions::where('provider_id',$provider)->count();
    }

    public static function CountCom($provider)
    {
        return PurchaseOrderDetail::where('provider_id',$provider)->count();
    }
}
