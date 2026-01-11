<div class="w-full max-w-sm px-4 py-3 bg-white rounded-md shadow-md dark:bg-gray-800">
    <div class="flex items-center justify-end">
        <span class="px-3 py-1 text-xs uppercase rounded-full
            {{ match($todo->status) {
                'not_started' => 'text-blue-800 bg-blue-200 dark:bg-blue-300',
                'in_progress' => 'text-orange-800 bg-orange-200 dark:bg-orange-300',
                'completed' => 'text-green-800 bg-green-200 dark:bg-green-300',
            } }}">{{ Str::replace('_', ' ', $todo->status) }}
        </span>
    </div>
    <div>
        <h2 class="mt-2 text-lg font-semibold text-gray-800 dark:text-white">{{ $todo->title }}</h2>
        <x-expandable-text :text="$todo->description" />
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
            <form action="{{ route('todos.destroy', $todo) }}" method="POST">
                @csrf
                @method('DELETE')
                <x-buttons.filled>Done</x-buttons.filled>
            </form>
            <x-links.outline href="{{ route('todos.edit', $todo) }}">Edit</x-links.outline>
        </div>
    </div>
</div>
