<div class="border border-blue-400 rounded-lg py-6 px-8 mb-8">
    <form method="POST" action="/tweets">
        @csrf
        <textarea name="body" class="w-full" placeholder="What's up doc?" required autofocus></textarea>
        <hr class="my-4">
        <footer class="flex justify-between items-center">
            <img
            src="{{auth()->user()->avatar}}"
            class="rounded-full mr-2"
            width="50"
            height="50">
            <button type="submit" class="hover:bg-blue-600 bg-blue-500 rounded-lg shadow px-10 text-white text-sm h-10">Publish</button>

        </footer>
    </form>
    @error('body')
    <p class="text-red-500 text-sm mt-2">{{$message}}</p>
    @enderror
</div>