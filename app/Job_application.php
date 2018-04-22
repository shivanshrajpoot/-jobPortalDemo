<?php

namespace App;

class Job_application extends Model
{
    public function job()
    {
    	return $this->belongsTo(Job::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
