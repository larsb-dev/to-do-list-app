<x-layout :title="$title">
    <x-container>
        <x-form :todo="$todo" title="Edit" action="{{ route('todos.update', $todo) }}" method="PATCH" />
    </x-container>
    @if ($errors->any())
        <x-alerts.error-pop class="absolute bottom-10 right-10">
            Your Todo could not be edited!
        </x-alerts.error-pop>
    @endif
</x-layout>
