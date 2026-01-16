<x-layouts.auth :title="$title">
    <x-container>
        <x-todo-form title="Add" action="{{ route('todos.store') }}" method="POST" />
    </x-container>
    @if ($errors->any())
        <x-alerts.error-pop class="absolute bottom-10 right-10">
            Your Todo could not be created!
        </x-alerts.error-pop>
    @endif
</x-layouts.auth>
