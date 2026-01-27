@props(['text', 'limit' => 50])

@php
  $buttonStyles = 'mt-4 text-gray-600 dark:text-gray-300';
@endphp

<div x-data="{
            expanded: false,
            fullText: '{{ $text }}',
            truncatedText: '{{ Str::limit($text, $limit) }}'
        }">
  <p class="mt-2 text-sm text-gray-600 dark:text-gray-300" x-text="expanded ? fullText : truncatedText"></p>
  <button class="{{ $buttonStyles }}" @click="expanded = !expanded" x-show="!expanded">Read
    More</button>
  <button class="{{ $buttonStyles }}" @click="expanded = !expanded" x-show="expanded">Read
    Less</button>
</div>
