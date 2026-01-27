@php
  $enabled = 'flex items-center px-4 py-2 text-gray-700 transition-colors duration-300 transform bg-white rounded-md dark:bg-gray-800 dark:text-gray-200 hover:bg-blue-600 dark:hover:bg-blue-500 hover:text-white dark:hover:text-gray-200';
  $disabled = 'flex items-center px-4 py-2 text-gray-500 bg-white rounded-md dark:bg-gray-800 dark:text-gray-600 cursor-not-allowed';
@endphp

@if ($paginator->hasPages())
  <div class="flex justify-between">
    @if ($paginator->onFirstPage())
      <span class="{{ $disabled }}">Previous</span>
    @else
      <a href="{{ $paginator->previousPageUrl() }}" class="{{ $enabled }}">
        Previous
      </a>
    @endif
    @if ($paginator->hasMorePages())
      <a href="{{ $paginator->nextPageUrl() }}" class="{{ $enabled }}">
        Next
      </a>
    @else
      <span class="{{ $disabled }}">Next</span>
    @endif
  </div>
@endif
