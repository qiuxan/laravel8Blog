
<x-layout>
    <h1>{{$post->title}}</h1>
    <p>Written by <a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a> in <a href="/category/{{$post->category->slug}}">{{$post->category->name}}</a></p>

    <article>
        <?php //dd($post)?>
        <?=$post->body?>
    </article>
    <a href="/">Go back</a>

</x-layout>



