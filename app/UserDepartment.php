<?php

namespace HAE;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDepartment extends Model
{
    use HasFactory;
    protected $table = 'user_department';
    public $timestamps = false;

    protected $fillable = [
        'jefe_id',
        'department_id'
    ];
}
