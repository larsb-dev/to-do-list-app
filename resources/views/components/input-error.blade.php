@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-red-500 text-sm']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
