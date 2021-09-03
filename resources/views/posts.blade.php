
<x-layout>
    <x-banner attribute="font-size: 2em;">
        My Blog
    </x-banner>

    @foreach ($posts as $post)

    <article>

        <h1><a href='/posts/<?=$post->slug?>'><?=$post->title?></a></h1>
        {{--<h2><?=$post->date?></h2>--}}
        <p>Written by <a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a> in <a href="/category/{{$post->category->slug}}">{{$post->category->name}}</a></p>

        <?=$post->excerpt?>
    </article>
    @endforeach
</x-layout>

