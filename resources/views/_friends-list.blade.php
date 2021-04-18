<div class="border border-gray-300 bg-gray-200 rounded-lg py-4 px-6">
<h3 class="font-bold text-xl mb-4">Following </h3>
<ul>
   @if(is_null(auth()->user()))
   
      {{route('register')}}
   
   @else
  @forelse (auth()->user()->follows as $user)
      
  
    <li class="{{$loop->last ? '' : 'mb-4'}}">
        <div >
            <a href="{{route('profile' , $user)}}" class="flex items-center text-sm">
            <img
            src="{{$user->avatar}}"
            class="rounded-full mr-2"
            width="40"
            height="40">
            
            {{$user->name}}
        </a>
        </div>
    </li>
    @empty
    <li>No Following Yet!</li>
    @endforelse

@endif
</ul>
</div>