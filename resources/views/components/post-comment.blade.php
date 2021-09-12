@props(['comment'])

<x-panel class="flex bg-gray-50 ">
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/60?u={{$comment->user_id}}" alt="" width="60" height="60" class="rounded-xl">
    </div>
    <div>
        <header class="mb-4">
            <h3 class="font-bold">{{ucwords($comment->author->name)}}</h3>
            <p class="text-xs">
                Posted
                <time> {{$comment->created_at->diffForHumans()}}</time>
            </p>

        </header>
        <p>
            {{$comment->body}}
        </p>

    </div>
</x-panel>
{{--<article class=" border border-gray-200 rounded-xl p-6 space-x-4 mt-6">--}}
    {{----}}
{{--</article>--}}

