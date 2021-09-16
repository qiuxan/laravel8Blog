<x-layout>

    <x-setting heading="Publish New Post">

        <form action="/admin/posts" method="POST" enctype="multipart/form-data">

            @csrf

            <x-form.input name="title"/>

            <x-form.input name="thumbnail" type="file"/>

            <x-form.textarea name="excerpt"/>

            <x-form.textarea name="body"/>


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
                                @if(old('category_id') == $category->id) selected @endif
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

    </x-setting>
</x-layout>