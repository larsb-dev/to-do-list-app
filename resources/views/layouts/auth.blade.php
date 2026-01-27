<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title ?? 'To-Do List Application'}}</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white dark:bg-gray-950">
  <main>
    <div class="flex">
      <x-sidebar />
      {{ $slot }}
    </div>
  </main>
</body>

</html>
