<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Asumiendo que usas Vite -->
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-900">

    <livewire:layouts.navbar-component/>

    <!-- Sidebar -->
    <aside class="bg-white w-64 fixed top-16 bottom-0 left-0 border-r border-gray-200 shadow-sm">
        <div class="p-4">
            <ul class="space-y-2">
                <li>
                    <a href="#" class="block px-4 py-2 rounded hover:bg-gray-100">Inicio</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 rounded hover:bg-gray-100">Perfil</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 rounded hover:bg-gray-100">Configuración</a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="block px-4 py-2 rounded hover:bg-gray-100">Registrar Cuenta</a>
                </li>
                <li>
                    <a href="{{ route('evidencias') }}" class="block px-4 py-2 rounded hover:bg-gray-100">Mis Evidencias</a>
                </li>
                <li>
                    <livewire:auth.logout />
                </li>
            </ul>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="ml-64 mt-16 p-6">
        {{ $slot }}

    </main>

    @livewireScripts
</body>
</html>
