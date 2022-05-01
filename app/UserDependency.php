<?php

namespace HAE;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDependency extends Model
{
    use HasFactory;
    protected $table = 'user_dependencies';
    public $timestamps = false;

    protected $fillable = [
        'director_id',
        'dependency_id'
    ];
}
