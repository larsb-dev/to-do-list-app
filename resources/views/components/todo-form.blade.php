@props(['title', 'action', 'method', 'todo' => null])

@php
  use App\Models\Status;
@endphp

<x-form :title="$title" action="{{ $action }}" method="{{ $method }}">
  <div>
    <x-form-label for="title">Title</x-form-label>
    <x-form-input id="title" name="title" value="{{ old('title', $todo?->title) }}" />
  </div>
  <x-input-error :messages="$errors->get('title')" />
  <div>
    <x-form-label for="description">Description</x-form-label>
    <x-form-input id="description" name="description" value="{{ old('description', $todo?->description) }}" />
  </div>
  <x-input-error :messages="$errors->get('description')" />
  <div>
    <x-form-label for="status">Status</x-form-label>
    <select
      class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
      name="status_id" id="status">
      @foreach(Status::all() as $status)
        <option value="{{ $status->id }}" @selected($todo?->status_id === $status->id)>
          {{ Str::replace('_', ' ', $status->name) }}
        </option>
      @endforeach
    </select>
  </div>
  <div class="flex items-center justify-end space-x-4 mt-6">
    @if (request()->routeIs('todos.edit'))
      <button class="hover:text-red-500 dark:hover:text-red-400 dark:text-gray-200" form="delete-form"
        aria-label="Delete">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
          class="w-5 h-5">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
        </svg>
      </button>
    @endif
    <x-buttons.filled :primary="false">Save</x-buttons.filled>
  </div>
</x-form>

@if (request()->routeIs('todos.edit'))
  <form id="delete-form" action="{{ route('todos.destroy', $todo) }}" method="POST">
    @csrf
    @method('DELETE')
  </form>
@endif
