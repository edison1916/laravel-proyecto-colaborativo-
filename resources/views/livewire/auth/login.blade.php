<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 space-y-6 bg-white rounded shadow">
        <h2 class="text-2xl font-bold text-center">Iniciar Sesión</h2>
        
        @if ($errorMessage)
            <div class="p-2 text-red-600 bg-red-100 rounded">
                {{ $errorMessage }}
            </div>
        @endif

        <form wire:submit.prevent="login" class="space-y-4">
            <div>
                <label class="block mb-1">Correo electrónico</label>
                <input type="email" wire:model="email" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div>
                <label class="block mb-1">Contraseña</label>
                <input type="password" wire:model="password" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div>
                <label class="inline-flex items-center">
                    <input type="checkbox" wire:model="remember" class="mr-2">
                    Recordarme
                </label>
            </div>
            <button type="submit" class="w-full py-2 text-white bg-blue-600 rounded hover:bg-blue-700">
                Iniciar Sesión
            </button>
        </form>
    </div>
</div>
