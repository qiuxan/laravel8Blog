@props(['trigger'])
<div x-data="{show: false}" @click.away="show=false" class="relative">
{{--trigger--}}
    <div @click="show=!show">
        {{$trigger}}
    </div>
    {{--links--}}
    <div x-show="show"  class="absolute py-2 bg-gray-100 w-full mt-2 rounded-xl z-50 overflow-auto max-h-52" style="display: none">
        {{$slot}}
    </div>
</div>
