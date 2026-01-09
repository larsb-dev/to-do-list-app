<x-layout :title="$title">
    <x-container>
        <h1 class="text-3xl dark:text-blue-400 text-gray-700 my-10 font-bold tracking-wide">
            @if ($todos->isNotEmpty())
                You have {{ $todos->count() }} {{ Str::plural('ToDo', $todos->count()) }}
            @else
                You're done for the day
            @endif
        </h1>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($todos as $todo)
                <x-card :todo="$todo" />
            @endforeach
        </div>
    </x-container>
</x-layout>
