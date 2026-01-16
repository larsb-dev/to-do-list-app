<x-layouts.auth :title="$title">
    <x-container class="py-12">
        <x-filter />
        <div class="grid md:grid-cols-2 lg:grid-cols-3 justify-items-center gap-6 mb-12">
            @foreach ($todos as $todo)
                <x-card :todo="$todo" />
            @endforeach
        </div>
        {{ $todos->links('components.pagination') }}
    </x-container>
    @if (session('status'))
        <x-alerts.success-pop class="absolute bottom-10 right-10">
            Your Todo was created successfully!
        </x-alerts.success-pop>
    @endif
</x-layouts.auth>
