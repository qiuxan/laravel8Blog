
<x-layout>
    <x-banner attribute="">
        <h1>{{$post->title}}</h1>
        <p><a href="/category/{{$post->category->slug}}">{{$post->category->name}}</a></p>
    </x-banner>
    <article>
        <?php //dd($post)?>
        <?=$post->body?>
    </article>
    <a href="/">Go back</a>

</x-layout>



