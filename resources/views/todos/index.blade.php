<x-layout :title="$title">
    <x-container>
        <h1 class="text-3xl dark:text-blue-400 text-gray-700 my-10 font-bold tracking-wide">
            <a href="{{ route('home') }}">You have {{ count($todos) }} ToDos Open</a>
        </h1>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($todos as $todo)
                <x-card :todo="$todo" />
            @endforeach
            <div x-data="{ visible: false }" x-show="visible">
                <div  class="absolute w-1/2 h-screen bg-white top-0 left-0 shadow-lg items-center justify-center">
                    <p>My Name is John Wick</p>
                </div>
            </div>
        </div>
    </x-container>
</x-layout>
