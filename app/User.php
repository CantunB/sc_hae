<?php

namespace Smapac;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'NoEmpleado',
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
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function asignado()
    {
        return $this->hasOne(AssignedUserAreas::class, 'user_id');
    }
    public function asignar()
    {
        return $this->belongsToMany(AssignedAreas::class,'assigned_user_areas','user_id','areas_id');
    }
    public function areas()
    {
        return $this->belongsTo(AssignedAreas::class, 'areas_id');
    }
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
