<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'cell_phone',
        'document',
        'birth_date',
        'city_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birth_date'        => 'date:Y-m-d'
    ];
    
    public function getAgeAttribute(){
        $hours_in_day   = 24;
        $minutes_in_hour= 60;
        $seconds_in_mins= 60;
        $birth_date     = new \DateTime($this->birth_date);
        $current_date   = new \DateTime();
        $diff           = $birth_date->diff($current_date);
        return $diff->y . " years " . $diff->m . " months " . $diff->d . " day(s)";
    }
}
