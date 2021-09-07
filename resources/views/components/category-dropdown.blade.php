<x-dropdown>
    <x-slot name="trigger">
        <button
                class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex"
        >
            {{isset($currentCategory)? ucwords($currentCategory->name):'Categories'}}

            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"/>
        </button>
    </x-slot>
    <x-dropdown-item href="/" :active="isset($currentCategory) ? false : request()->routeIs('home')" >
        All
    </x-dropdown-item>

{{--    {{ddd($categories[1]->id===$currentCategory->id)}}--}}


    @foreach($categories as $category)




        <x-dropdown-item
                href="/?category={{$category->slug}}"
                {{--:active="(isset($currentCategory) && $currentCategory->id === $category->id)"--}}
                :active='$category->is($currentCategory)'

                 {{--:active="request()->is('categories/'.$category->slug)"--}}
        >
            {{ucwords($category->name)}}
        </x-dropdown-item>
    @endforeach
</x-dropdown>