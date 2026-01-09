<x-layout :title="$title">
    <x-container>
        <x-form title="Add" action="{{ route('todos.store') }}" method="POST" />
    </x-container>
</x-layout>
