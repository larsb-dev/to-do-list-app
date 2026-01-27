@props(['primary' => true])

@if ($primary)
  <button {{ $attributes }}
    class="px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
    {{ $slot }}
  </button>
@else
  <button {{ $attributes }}
    class="px-8 py-2.5 leading-5 text-white transition-colors duration-300 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">
    {{ $slot }}
  </button>
@endif
