
<x-layout>
    <x-banner attribute="">
        <h1><?=$post->title?></h1>
    </x-banner>
    <article>
        <?php //dd($post)?>
        <?=$post->body?>
    </article>
    <a href="/">Go back</a>

</x-layout>



