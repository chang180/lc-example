<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel Cookbook') }}</title>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Styles -->
    @livewireStyles
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans antialiased text-gray-900">
    <div class="min-h-screen bg-gray-100">
        <div class="bg-purple-800 text-white">
            <a href="/announcement"
                class="container mx-auto px-4 py-7 flex items-center lg:w-max text-center hover:text-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.114 5.636a9 9 0 010 12.728M16.463 8.288a5.25 5.25 0 010 7.424M6.75 8.25l4.72-4.72a.75.75 0 011.28.53v15.88a.75.75 0 01-1.28.53l-4.72-4.72H4.51c-.88 0-1.704-.507-1.938-1.354A9.01 9.01 0 012.25 12c0-.83.112-1.633.322-2.396C2.806 8.756 3.63 8.25 4.51 8.25H6.75z" />
                </svg>
                <div class="ml-4">Promo Title goes here. Click for details!</div>
            </a>
        </div>
        <div class="bg-blue-600 text-white">
            <nav class="container mx-auto px-4 py-4 space-x-6">
                <a href="/" class="hover:text-gray-200">Home</a>
                <a href="/charts" class="hover:text-gray-200">Charts</a>
                <a href="/stats" class="hover:text-gray-200">Stats</a>
            </nav>
        </div>

        <!-- Page Content -->
        <main class="container mx-auto px-4 py-4">
            {{ $slot }}
        </main>
    </div>

    <!-- Scripts -->
    @livewireScripts
    @stack('scripts')
</body>

</html>
