@props(['name'])

<div class="mb-6">
    <label for="{{$name}}"
           class="block mb-2 uppercase font-bold text-xs text-gray-700">{{$name}}</label>
    <textarea
            class="border border-gray-200 p2 w-full rounded"
            name="{{$name}}"
            id="{{$name}}"

    >{{old($name)}}</textarea>
    <x-form.error errorName="{{$name}}"/>
</div>

