<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
	protected $fillable = ['title', 'image_url', 'user_id'];

    public static $validationRules = [
        'title' => 'required',
        'file' => 'required|mimes:jpg,jpeg,png,gif'
    ];

    public function user()
    {
    	return $this->belongsTo('\App\User');
    }

    public function comments()
    {
    	return $this->hasMany('\App\Comment');
    }

    public function scopebyId($query)
    {
        return $query->orderBy('id', 'desc');
    }
    

    public function scopebyVotes($query)
    {
        return $query->orderBy('votes', 'desc');
    }   
}
