@component('components.app')
    <div>
        @foreach ($users as $user)
        <a href="{{$user->path()}}" class="flex items-center mb-5">
            <img src="{{$user->avatar}}"
            alt="{{$user->name}}"
            width="60"
            class="mr-4 rounded">
            <div>
                <h4 class="font-bold">{{'@'.$user->username}}</h4>
            </div>
        </a>
        @endforeach
       
    </div>
@endcomponent