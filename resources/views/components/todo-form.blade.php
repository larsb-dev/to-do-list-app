@props(['title', 'action', 'method', 'todo' => null])

@php
  use App\Models\Status;
@endphp

<x-form :title="$title" action="{{ $action }}" method="{{ $method }}">
  <div>
    <x-form-label for="title">Title</x-form-label>
    <x-form-input id="title" name="title" value="{{ old('title', $todo?->title) }}" required />
  </div>
  <x-input-error :messages="$errors->get('title')" />
  <div>
    <x-form-label for="description">Description</x-form-label>
    <x-form-input id="description" name="description" value="{{ old('description', $todo?->description) }}" required />
  </div>
  <x-input-error :messages="$errors->get('description')" />
  <div>
    <x-form-label for="status">Status</x-form-label>
    <select
      class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring"
      name="status_id" id="status" required>
      @foreach(Status::all() as $status)
        <option value="{{ $status->id }}" @selected($todo?->status_id === $status->id)>
          {{ Str::replace('_', ' ', $status->name) }}
        </option>
      @endforeach
    </select>
  </div>
  <div class="flex items-center justify-end space-x-4 mt-6">
    @if (request()->routeIs('todos.edit'))
      <x-buttons.trash form="delete-form" />
    @endif
    <x-buttons.secondary>Save</x-buttons.secondary>
  </div>
</x-form>

@if (request()->routeIs('todos.edit'))
  <form id="delete-form" action="{{ route('todos.destroy', $todo) }}" method="POST">
    @csrf
    @method('DELETE')
  </form>
@endif
