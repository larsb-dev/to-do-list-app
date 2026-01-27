@php
  use App\Models\Status;
  $linkStyles = 'px-3 py-1 text-xs uppercase rounded-full';
@endphp

<div class="mb-8 flex justify-end space-x-4">
  <a href="{{ route('todos.index') }}" class="{{ $linkStyles }} text-gray-800 bg-gray-200 dark:bg-gray-300 ">
    All
  </a>
  <a href="{{ route('todos.index', ['status' => Status::NOT_STARTED]) }}"
    class="{{ $linkStyles }} text-blue-800 bg-blue-200 dark:bg-blue-300">
    Not Started
  </a>
  <a href="{{ route('todos.index', ['status' => Status::IN_PROGRESS]) }}"
    class="{{ $linkStyles }} text-orange-800 bg-orange-200 dark:bg-orange-300">
    In Progress
  </a>
  <a href="{{ route('todos.index', ['status' => Status::COMPLETED]) }}"
    class="{{ $linkStyles }} text-green-800 bg-green-200 dark:bg-green-300">
    Completed
  </a>
</div>
