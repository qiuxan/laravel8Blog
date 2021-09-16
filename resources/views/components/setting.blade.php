@props(['heading'])
<section class="px-6 py-8 max-w-4xl  mx-auto">
    <h1 class="text-lg font-bold mb-4 border-b pb-3 mb-6">
        {{$heading}}
    </h1>
    <div class="flex">
        <aside class="w-48">
            <ul>
                <li>
                    <a href="/admin/dashboard" class="{{ request()->is('admin/dashboard') ? 'text-blue-500' : '' }}">Dashboard</a>
                </li>

                <li>
                    <a href="/admin/posts/create" class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}">New Post</a>
                </li>
            </ul>            </ul>
        </aside>
        <main class="flex-1">
            <x-panel class="">
                {{$slot}}
            </x-panel>
        </main>

    </div>




</section>
