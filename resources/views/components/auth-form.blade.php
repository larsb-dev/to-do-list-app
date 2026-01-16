@php
    $svgBaseClasses = 'w-6 h-6 mx-3 text-gray-300 dark:text-gray-500';
@endphp

<section class="bg-white dark:bg-gray-900">
    <div class="container flex items-center justify-center min-h-screen px-6 mx-auto">
        <form action="{{ $action }}" class="w-full max-w-md" method="POST">
{{--            <div class="flex justify-center mx-auto">--}}
{{--                <img class="w-auto h-7 sm:h-8" src="https://merakiui.com/images/logo.svg" alt="">--}}
{{--            </div>--}}
            @csrf
            @method($method)

            <x-tabs />

            @if (request()->routeIs('register'))
                <x-input placeholder="Name" name="name" class="mt-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="{{ $svgBaseClasses }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </x-input>
            @endif

            <x-input-error :messages="$errors->get('name')" />

            <x-input type="email" name="email" placeholder="Email address">
                <svg xmlns="http://www.w3.org/2000/svg" class="{{ $svgBaseClasses }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </x-input>

            <x-input-error :messages="$errors->get('email')" />

            <x-input type="password" name="password" placeholder="Password">
                <svg xmlns="http://www.w3.org/2000/svg" class="{{ $svgBaseClasses }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </x-input>

            <x-input-error :messages="$errors->get('password')" />

            @if (request()->routeIs('register'))
                <x-input type="password" name="password_confirmation" placeholder="Confirm Password">
                    <svg xmlns="http://www.w3.org/2000/svg" class="{{ $svgBaseClasses }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </x-input>
            @endif

            <div class="mt-6">
                <button class="w-full px-6 py-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                    Sign Up
                </button>

                @if (request()->routeIs('register'))
                    <div class="mt-6 text-center ">
                        <a href="{{ route('login') }}" class="text-sm text-blue-500 hover:underline dark:text-blue-400">
                            Already have an account?
                        </a>
                    </div>
                @endif
            </div>
        </form>
    </div>
</section>
