<x-layout :title="$title">
    <x-container>
        <h1 class="text-3xl dark:text-blue-300 text-gray-700 my-10 font-bold tracking-wide">
            @if ($todos->isNotEmpty())
                You still got work to do!
            @else
                Relax, you're done for the day!
            @endif
        </h1>
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
</x-layout>
