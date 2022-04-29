<?php

namespace HAE;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Dependency extends Model
{
    use HasFactory;

    protected $table = 'dependencies';

    protected $fillable = [
        'name',
        'slug',
        'colony_dependency',
        'address_dependency',
        'telephone_dependency',
        'email_dependency',
        'status'
    ];

    public $timestamps = false;
    protected $appends = ['fullname'];

    public function getFullNameAttribute()
    {
        return "{$this->name} ({$this->slug})";
    }

    /**
     * The roles that belong to the Dependency
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function coordinations(): BelongsToMany
    {
        return $this->belongsToMany(Coordination::class, 'dependency_coordination');
    }
}
