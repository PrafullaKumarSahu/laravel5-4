<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts()
    {
    	//1 tag may belongs to many post 
    	//as well as a post may have many tags
    	return $this->belongsToMany(Post::class);
    }

    public function getRouteKeyName()
    {
    	return 'name';
    }
}
