<div class="w-full max-w-sm px-4 py-3 bg-white rounded-md shadow-md dark:bg-gray-800">
    <div class="flex items-center justify-end">
        <span class="px-3 py-1 text-xs text-blue-800 uppercase bg-blue-200 rounded-full dark:bg-blue-300 dark:text-blue-900">{{ $todo->category }}</span>
    </div>

    <div>
        <h2 class="mt-2 text-lg font-semibold text-gray-800 dark:text-white">{{ $todo->title }}</h2>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">{{ $todo->description }}</p>
    </div>

    <div>
{{--        <div class="flex items-center mt-2 text-gray-700 dark:text-gray-200">--}}
{{--            <span>Visit on:</span>--}}
{{--            @foreach ($links as $link)--}}
{{--                <a class="mx-2 text-blue-600 cursor-pointer dark:text-blue-400 hover:underline" href="{{ $link ?? route('home') }}" tabindex="0" role="link">edx.org</a>--}}
{{--                @if($loop->first)--}}
{{--                    <span>|</span>--}}
{{--                @endif--}}
{{--            @endforeach--}}
{{--        </div>--}}
        <div class="flex items-center justify-between mt-4">
{{--            <form action="{{ route('todo') }}" method="POST" class="inline">--}}
{{--                @csrf--}}
{{--                @method('PATCH')--}}
{{--                <x-buttons.outline>Done</x-buttons.outline>--}}
{{--            </form>--}}
{{--            Edit button should be link not form--}}
            <form action="{{ route('todos.edit', $todo->id) }}" method="GET">
                @csrf
                <x-buttons.primary>Edit</x-buttons.primary>
            </form>
        </div>
    </div>
</div>
