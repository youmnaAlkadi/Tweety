<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles' , [
            'user'=> $user , 
            'tweets' => $user->tweets()->withLikes()->paginate(50),
        ]);

    }

    public function edit(User $user)
    {
        if(auth()->user()->isNot($user))
        {
            abort(404);
        }
        return view('edit' , compact($user));
    }
    public function update(User $user)
    {
        if(auth()->user()->isNot($user))
        {
            abort(404);
        }
        else{
        $att = request()->validate([
            'username' =>['string' , 'required' , 'max:255' ,'alpha_dash', Rule::unique('users')->ignore($user)],
            'name' =>['string' , 'required' , 'max:255'],
            'avatar' =>['file'  ],
            'email' =>['string' , 'required' , 'max:255' , 'email', Rule::unique('users')->ignore($user)],
            'password' =>['string' , 'required' , 'max:255' , 'min:8' , 'confirmed']
        ]);

        if(request('avatar'))
        {
            $att['avatar'] = request('avatar')->store('avatars');


        }


        $user->update($att);
    }
        return redirect( $user->paath());
    }

}
