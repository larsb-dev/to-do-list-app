@props(['type' => 'text', 'name', 'placeholder' => ''])

<div {{ $attributes->merge(['class' => 'relative flex items-center mt-4']) }}>
  <span class="absolute">
    {{ $slot }}
  </span>
  <input type="{{ $type }}" name="{{ $name }}" value="{{ old($name) }}"
    class="block w-full py-3 text-gray-700 bg-white border rounded-lg px-11 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
    placeholder="{{ $placeholder }}">
</div>
