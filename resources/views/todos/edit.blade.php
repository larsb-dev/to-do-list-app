<x-layout :title="$title">
    <x-container>
        <x-form :todo="$todo" title="Edit" action="{{ route('todos.update', $todo) }}" method="PATCH" />
    </x-container>
</x-layout>
