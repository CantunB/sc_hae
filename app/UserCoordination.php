<?php

namespace HAE;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCoordination extends Model
{
    use HasFactory;
    protected $table = 'user_coordination';
    public $timestamps = false;

    protected $fillable = [
        'titular_id',
        'coordination_id'
    ];
}
