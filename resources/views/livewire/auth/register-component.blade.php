<div>

<div class="max-w-xl mx-auto bg-yellow-100 p-10 rounded-3xl shadow-2xl border-4 border-blue-500">


    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <h2 class="text-2xl font-bold text-center mb-6">Crear una Cuenta</h2>

    <form wire:submit.prevent="register">0
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" id="name" wire:model="name" class="w-full p-3 border border-gray-300 rounded-md mt-1" />
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex-1">
            <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
            <input type="email" id="email" wire:model="email" class="w-full p-3 border border-gray-300 rounded-md mt-1" />
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
            <input type="password" id="password" wire:model="password" class="w-full p-3 border border-gray-300 rounded-md mt-1" />
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Contraseña</label>
            <input type="password" id="password_confirmation" wire:model="password_confirmation" class="w-full p-3 border border-gray-300 rounded-md mt-1" />
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white p-3 rounded-md hover:bg-blue-600">Registrar</button>
    </form>



    <div class="flex flex-row justify-start items-start gap-4">
    <!-- Campo 1: Nombre -->
    <div class="flex-1">
        <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
        <input type="text" id="name" wire:model="name" class="w-full p-3 border border-gray-300 rounded-md mt-1" />
        @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Campo 2: Correo Electrónico -->
    <div class="flex-1">
        <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
        <input type="email" id="email" wire:model="email" class="w-full p-3 border border-gray-300 rounded-md mt-1" />
        @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Campo 3: Contraseña -->
    <div class="flex-1">
        <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
        <input type="password" id="password" wire:model="password" class="w-full p-3 border border-gray-300 rounded-md mt-1" />
        @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Campo 4: Confirmar Contraseña -->
    <div class="flex-1">
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Contraseña</label>
        <input type="password" id="password_confirmation" wire:model="password_confirmation" class="w-full p-3 border border-gray-300 rounded-md mt-1" />
    </div>
</div>

</div>
</div>