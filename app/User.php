<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function Libros()
    {
        return $this->hasMany('App\Libro');
    }

    public function roles(){
        return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id')->withTimestamps();
    }
    
    /**
     * Verifica los roles autorizados.
     *
     * @param Array|String
     * @return void
     */
    public function authorizeRoles($roles)
    {
        abort_unless($this->hasAnyRole($roles), 401);
        return true;
    }

    /**
     *
     * @param Array|String $roles que queremos saber si tienen rol asignado
     * @return boolean
     */
    public function hasAnyRole($roles)
    {
        if(is_array($roles)){
            foreach($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }
            }
        } else {
            return $this->hasRole($roles);
        }

        return false;
    }

    /**
     *
     * @param String $role el nombre del role por verificar
     * @return boolean
     */
    public function hasRole($role)
    {

        //return $this->roles()->where('name', $role)->first() != null; forma corta

        //forma larga:
        if($this->roles()->where('name', $role)->first()){
            return true;
        }

        return false;
    }
}
