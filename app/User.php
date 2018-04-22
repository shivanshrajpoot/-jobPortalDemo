<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function applications()
    {
        return $this->hasMany(Job_application::class);
    }

    public function publish(Job $job)
    {
        $this->jobs()->save($job);
    }

    public function apply(Job_application $application){
        $this->applications()->save($application);
    }
}
