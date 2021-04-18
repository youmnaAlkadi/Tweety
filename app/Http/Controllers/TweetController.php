<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function store()
    {
        $att = request()->validate(['body' => 'required|max:255']);

        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $att['body']
        ]);

        return redirect('/tweets');
    }

    public function index()
    {
        return view('home' ,[
            'tweets' => auth()->user()->timeline()
        ]);
    }
}
