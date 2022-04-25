<?php

namespace HAE;

use Illuminate\Database\Eloquent\Model;

class Storehouse extends Model
{
    protected $table = 'storehouses';

    protected $fillable = [
        'quantity',
        'unit',
        'concept',
        'description'
    ];
}
