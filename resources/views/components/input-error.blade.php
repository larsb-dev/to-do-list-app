@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-red-500 text-sm my-4']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
