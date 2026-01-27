@props(['title', 'action', 'method'])

<section class="max-w-4xl p-6 mx-auto mt-16 bg-white rounded-md shadow-md dark:bg-gray-800">
  <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">{{ $title }}</h2>
  <form action="{{ $action }}" method="POST">
    @csrf
    @method($method)

    <div class="grid gap-6 mt-4">
      {{ $slot }}
    </div>
  </form>
</section>
