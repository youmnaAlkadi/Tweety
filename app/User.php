<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable, Followable, Likable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'username', 'avatar', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $guarded = [];

    public function getAvatarAttribute($value)
    {
        if(is_null($value))
        {
            return asset('/images/ironman.jpg');
        }
        else
        {
        return asset('storage/'.$value );}
    }
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = (Hash::needsRehash($value)) ? bcrypt($value) : $value;

    }

    
    public function timeline()
    {
        $ids = $this->follows->pluck('id');
        $ids->push($this->id);
        return Tweet::whereIn('user_id', $ids)->withLikes()->latest()->paginate(50);
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

   public function path($append = '')
   {
       $path= route('profile' , $this->name);
       return $append? "{$path}/{$append}" : $path;
   }

   public function paath()
   {
       return route('profile' , $this->name);
   }

    public function getRouteKeyName()
    {
        return 'name';
    }

   
}
