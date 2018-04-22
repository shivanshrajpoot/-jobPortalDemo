<?php

namespace App;

class Job extends Model
{
	public function applications(){
		return $this->hasMany(Job_application::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function scopeSearch($query,$filters)
	{
		if (@$filters['keyword']) {
			return $query
		                ->latest()
		                ->where('title','like','%'.$filters['keyword'].'%')
		                ->get();
		}elseif (@$filters['user_id']) {
			return $query
			            ->latest()
			            ->where('user_id',$filters['user_id'])
			            ->get();
		}

	}


}
