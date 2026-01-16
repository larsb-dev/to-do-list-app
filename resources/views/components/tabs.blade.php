@php
    function mergeClasses($routeName)
    {
        $isActive = request()->routeIs($routeName);
        $baseClasses = 'w-1/3 pb-4 font-medium text-center border-b capitalize';
        $activeClasses = 'text-gray-800 dark:text-white border-blue-500 dark:border-blue-400 border-b-2';
        $inactiveClasses = 'text-gray-500 border-b dark:border-gray-400 dark:text-gray-300';

        return $isActive ? "$baseClasses $activeClasses" : "$baseClasses $inactiveClasses";
    }
@endphp

<div class="flex items-center justify-center mt-6">
    <a href="{{ route('login') }}" class="{{ mergeClasses('login') }}">
        sign in
    </a>
    <a href="{{ route('register') }}" class="{{ mergeClasses('register') }}">
        sign up
    </a>
</div>
