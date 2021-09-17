{{--{{ddd($post->title)}}--}}


<x-layout>

    {{--<x-setting heading="'Edit Post: '.$post->title">--}}
    <x-setting :heading="'Edit Post: ' . $post->title">


        <form action="/admin/posts/{{$post->id}}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PATCH')

            {{--<x-form.input name="title" value="{{$post->title}}"/>--}}

            <x-form.input name="title" :value="old('title', $post->title)" required />


            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" />
                </div>

                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">
            </div>

            <x-form.textarea name="excerpt">{{$post->excerpt}}</x-form.textarea>

            <x-form.textarea name="body">{{$post->body}}</x-form.textarea>


            <div class="mb-6">
                <label for="category_id"
                       class="block mb-2 uppercase font-bold text-xs text-gray-700">Category</label>
                <select

                        class="border border-gray-400 p2 w-full "
                        name="category_id"
                        id="category_id"

                >
                    @php
                        $categories=\App\Models\Category::all();
                    @endphp

                    @foreach($categories as  $category)
                        <option
                                value="{{$category->id}}"
                                {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}

{{--                                @if(old('category_id') == $category->id) selected @endif--}}
                        >
                            {{ucwords($category->name)}}

                        </option>
                    @endforeach
                </select>
                @error('category')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>


            <x-submit-button>Update</x-submit-button>

        </form>

        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li class="text-red-500 text-xs">{{$error}}</li>
                @endforeach
            </ul>
        @endif

    </x-setting>
</x-layout>