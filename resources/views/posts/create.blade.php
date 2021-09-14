<x-layout>
    <section class="px-6 py-8">
        <x-panel class="max-w-sm mx-auto">
            <form action="/admin/posts" method="POST">

                @csrf
                <div class="mb-6">
                    <label for="title"
                           class="block mb-2 uppercase font-bold text-xs text-gray-700">title</label>
                    <input
                            type="text3"
                            class="border border-gray-400 p2 w-full"
                            name="title"
                            id="title"
                            value="{{old('title')}}"

                    >
                    @error('title')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="excerpt"
                           class="block mb-2 uppercase font-bold text-xs text-gray-700">excerpt</label>
                    <textarea
                            class="border border-gray-400 p2 w-full"
                            name="excerpt"
                            id="excerpt"

                    >{{old('excerpt')}}</textarea>
                    @error('excerpt')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="body"
                           class="block mb-2 uppercase font-bold text-xs text-gray-700">body</label>
                    <textarea
                            class="border border-gray-400 p2 w-full"
                            name="body"
                            id="body"

                    >{{old('body')}}</textarea>
                    @error('body')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>


                {{--{{ddd($categories)}}--}}


                <div class="mb-6">
                    <label for="category"
                           class="block mb-2 uppercase font-bold text-xs text-gray-700">Category</label>
                    <select

                            class="border border-gray-400 p2 w-full "
                            name="category"
                            id="category"

                    >
                        @php
                            $categories=\App\Models\Category::all();
                        @endphp

                        @foreach($categories as  $category)
                            <option
                                    value="{{$category->id}}"
                                    @if(old('category') == $category->id) selected @endif
                            >
                                {{ucwords($category->name)}}

                            </option>
                        @endforeach
                    </select>
                    @error('category')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>


                <x-submit-button>Publish</x-submit-button>

            </form>

            @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                        <li class="text-red-500 text-xs">{{$error}}</li>
                    @endforeach
                </ul>
            @endif


        </x-panel>
    </section>
</x-layout>