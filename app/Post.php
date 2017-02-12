<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
	protected $fillable = ['title', 'image_url', 'user_id'];

    public function user()
    {
    	return $this->belongsTo('\App\User');
    }

    public function comments()
    {
    	return $this->hasMany('\App\Comment');
    }


    public static $validationRules = [
    	'title' => 'required',
    	'file' => 'required|mimes:jpg,jpeg,png,gif'
    ];
}
