@props(['posts'])
<x-post-feature-card :post="$posts[0]"/>

@if($posts->count()>1)
    <div class="lg:grid lg:grid-cols-6">
        {{--<x-post-card :post="$posts[1]"/>--}}

        @foreach($posts->skip(1) as $post)
            <?php //print_r($post->title)?>
            <x-post-card :post="$post" class="{{$loop->iteration<3?'col-span-3':'col-span-2'}}" />
        @endforeach

        {{--<x-post-card/>--}}
    </div>
@endif