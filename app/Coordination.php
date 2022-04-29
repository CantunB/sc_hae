<?php

namespace HAE;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Coordination extends Model
{
    protected $table = 'coordinations';

    protected $fillable = [
        'name',
        'slug'
    ];
    public $timestamps = false;
    protected $appends = ['fullname'];

    public function getFullNameAttribute()
    {
        return "{$this->name} ({$this->slug })";
    }

    /**
     * Get all of the comments for the Coordination
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dependency(): HasOne
    {
        return $this->hasOne(AssignedCoordinations::class, 'coordination_id');
    }

    public function departments(): BelongsToMany
    {
        return $this->belongsToMany(Department::class, 'coordination_department');
    }

    public static function getDepartments($coordination){
        return  AssignedAreas::select('department_id')
                ->where('coordination_id', $coordination)
                ->orderBy('department_id','ASC')
                ->get();
    }



}
