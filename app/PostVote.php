<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostVote extends Model
{
    
    protected $table = 'post_vote';

    protected $fillable = ['user_id', 'post_id'];


    public function scopeCheckCount($query)
    {
    	
    }
}
