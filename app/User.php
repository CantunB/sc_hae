<?php

namespace HAE;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    const usuario_activo = '1';
    const usuario_inactivo = '3';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'NoEmpleado',
        'grado',
        'name',
        'no_seg_soc',
        'categoria',
        'nivel',
        'rfc',
        'curp',
        'fe_nacimiento',
        'fe_ingreso',
        'email',
        'file_user'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $appends = ['gname'];


    public function scopeActive($query){
        return $query->where('status', '!=',2);
    }

    public function getGNameAttribute()
    {
        return "{$this->grado} {$this->name }";
    }

    public function asignado()
    {
        return $this->hasOne(AssignedUserAreas::class, 'user_id');
    }
    public function asignar()
    {
        return $this->belongsToMany(AssignedAreas::class,'assigned_user_areas','user_id','areas_id');
    }
    // public function areas()
    // {
    //     return $this->belongsTo(AssignedAreas::class, 'areas_id');
    // }
    public function departments()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function coordinations()
    {
        return $this->belongsTo(Coordination::class, 'coordination_id');
    }

    public function count(){
        return $this->hasMany(AssignedRequisition::class)->select('requisition_id')->count('requisition_id');
    }
}
