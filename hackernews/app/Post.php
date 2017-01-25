<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function votes(){
        return $this->hasMany('App\Vote');
    }

    public function vote_count(){
        $votes = $this->votes;
        $count = 0;
        foreach( $votes as $vote ){
            $count += $vote->value;
        }

        return $count;
    }
}
