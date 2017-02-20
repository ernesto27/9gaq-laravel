<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = ['body', 'active', 'user_id', 'post_id', 'parent_id'];

	public static $validationRules = [
		'comment' => 'required',
		'post_id' => 'required|integer'
	];

    public function user()
    {
    	return $this->belongsTo('\App\User');
    }

    public function children()
    {
    	return $this->hasMany('\App\Comment', 'parent_id');
    }


}
