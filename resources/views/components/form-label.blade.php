{{--With @props(['for' => '']), the for attribute gets extracted from $attributes and becomes a variable $for, so it won't be in $attributes anymore.--}}

<label {{ $attributes->merge(['class' => 'text-gray-700 dark:text-gray-200']) }} >
    {{ $slot }}
</label>
