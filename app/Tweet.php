<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    
  use Likable;
  
    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopewithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'select tweet_id , sum(liked) likes , sum(!liked) dislikes from likes group by tweet_id' ,
            'likes' , 
            'likes.tweet_id' , 
            'tweets.id'

        );

    
    }

  
}
