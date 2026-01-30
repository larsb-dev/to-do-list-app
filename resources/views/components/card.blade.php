@props(['todo'])

@php
  use App\Models\Status;
@endphp

<div class="w-full max-w-sm px-4 py-3 bg-white rounded-md shadow-md dark:bg-gray-800">
  <div class="flex items-center justify-end">
    <span class="px-3 py-1 text-xs uppercase rounded-full
            {{ match ($todo->status->name) {
  Status::NOT_STARTED => 'text-blue-800 bg-blue-200 dark:bg-blue-300',
  Status::IN_PROGRESS => 'text-orange-800 bg-orange-200 dark:bg-orange-300',
  Status::COMPLETED => 'text-green-800 bg-green-200 dark:bg-green-300',
} }}">{{ Str::replace('_', ' ', $todo->status->name) }}
    </span>
  </div>
  <div>
    <h2 class="mt-2 text-lg font-semibold text-gray-800 dark:text-white">{{ $todo->title }}</h2>
    <x-expandable-text :text="$todo->description" />
  </div>

  <div>
    <div class="flex items-center justify-between mt-4">
      <form action="{{ route('todos.complete', $todo) }}" method="POST">
        @csrf
        @method('PATCH')
        <x-buttons.primary>Done</x-buttons.primary>
      </form>
      <x-links.outline href="{{ route('todos.edit', $todo) }}">Edit</x-links.outline>
    </div>
  </div>
</div>
