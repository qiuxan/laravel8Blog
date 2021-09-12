@auth

    <x-panel>
        <form action="/posts/{{$post->slug}}/comments" method="POST" class="">
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{auth()->id()}}" alt="" width="40" height="40" class="rounded-full">
                <h1 class="ml-4">Want to participate?</h1>
            </header>

            <div class="mt-6">
                <textarea required name="body" id="comment" class="w-full text-sm focus:outline-none focus:ring" rows="5" placeholder="Quick, think of something to say"></textarea>
            </div>

            @error('body')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

            <div class="flex justify-end border-t border-gray-200 pt-6 mt-6">


                {{--<button type="submit" class="hover:bg-blue-600 bg-blue-500 font-semibold px-10 py-2 rounded-2xl text-white text-xs uppercase">POST</button>--}}
                <x-submit-button>Post</x-submit-button>


            </div>
            @csrf
        </form>
    </x-panel>

@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline">Register</a> or <a class="hover:underline" href="/login">log in</a> to leave comments.
    </p>
@endauth