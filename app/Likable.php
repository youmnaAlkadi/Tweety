<?php

namespace App;
use App\User;

trait Likable
{
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function dislikes()
{
    return $this->hasMany(Like::class)->where('liked' , false);
}


    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate([
            'user_id'=> $user ? $user->id :  auth()->id ,
            
        ], [
            'liked'=> $liked

        ]);
    }

    public function dislike($user = null , $liked = false)
    {
        return  $this->likes()->updateOrCreate([
            'user_id'=> $user ? $user->id :  auth()->id ,
            
        ], [
            'liked'=> $liked

        ]);
    }

    public function islikedBy(User $user)
    {
      return (bool) $user->likes()->where('tweet_id' , $this->id)->where('liked' , true)->count();
    }

    public function isDislikedBy(User $user)
    {
      return (bool) $user->likes()->where('tweet_id' , $this->id)->where('liked' , false)->count();
    }

   

}
