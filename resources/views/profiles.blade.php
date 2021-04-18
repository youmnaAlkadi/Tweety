@component('components.app')
    

<header class="mb-6 relative">
    <div class="relative">
    <img src="/images/avengers-infinity-war-14-heroes-facebook-cover.jpg" class="mb-2">
    <img
    src="{{$user->avatar}}"
    class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
    style="left: 50%"
    width="150">
    </div>
    <div class="flex justify-between items-center mb-6">
        <div class="max-width: 270px">
            <h2 class="font-bold text-2xl mb-2">{{$user->name}}</h2>
            <p class="text-sm">Joined {{$user->created_at->diffForHumans()}}</p>
        </div>
    <div class="flex">
        @if(auth()->user()->is($user))
        <a href="{{$user->path('edit')}}" class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs mr-2">Edit Profile</a>
        @endif
     @component('components.follow-button', ['user' => $user])
         
     @endcomponent
    </div>
    </div>
    <p class="text-sm">
        Scarlett Johansson as the Black Widow, Chris Hemsworth as Thor, Chris Evans as Captain America, Jeremy Renner as Hawkeye, Robert Downey, Jr., as Iron Man, and Mark Ruffalo as the Hulk in The Avengers (2012), directed by Joss Whedon
    </p>
 
       
    
</header>
@include('_timeline' , [
    'tweets' => $tweets
])
@endcomponent
