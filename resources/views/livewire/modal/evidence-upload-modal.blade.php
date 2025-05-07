<div>
    <!-- Botón para abrir el modal -->
    <div class="text-right mb-4">
        <button wire:click="toggleModal" class="bg-blue-500 text-white px-4 py-2 rounded-md">
            Cargar Evidencia
        </button>
    </div>

    <!-- Flash message -->
     <!-- prueba para cambios git carlos -->
    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <!-- Lista de archivos subidos -->
    <div class="mt-6">
        <h3 class="text-2xl font-semibold mb-4">Evidencias Subidas</h3>

        <!-- Tabla -->
        <div class="w-full overflow-x-auto shadow rounded-lg">
            <table class="w-full table-auto border-collapse bg-white">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 border-b">Archivo</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 border-b">Descripción</th>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 border-b">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($evidencias as $evidence)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-700">
                                <a href="{{ asset('storage/' . $evidence->file_path) }}" class="text-blue-500 hover:underline" target="_blank">
                                    {{ basename($evidence->file_path) }}
                                </a>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $evidence->description }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700 space-x-2 flex">
                                <button wire:click="editEvidence({{ $evidence->id }})" class="hover:text-blue-600">
                                    <x-heroicon-o-pencil class="w-5 h-5 text-blue-500" />
                                </button>
                                <button wire:click="deleteEvidence({{ $evidence->id }})" class="hover:text-red-600">
                                    <x-heroicon-o-trash class="w-5 h-5 text-red-500" />
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-gray-500">No hay evidencias subidas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Subir/Editar Evidencia -->
    <div x-data="{ open: @entangle('open') }">
        <div x-show="open" class="fixed inset-0 bg-gray-600 bg-opacity-50 z-40" @click="open = false"></div>

        <div x-show="open" class="fixed inset-0 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg z-50">
                <div class="text-right">
                    <button @click="open = false" class="text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <h3 class="text-2xl font-semibold text-center mb-4">
                    {{ $editing ? 'Editar Evidencia' : 'Subir Evidencia' }}
                </h3>

                <form wire:submit.prevent="submitEvidence">
                    @if(!$editing)
                        <div class="mb-4">
                            <label for="file" class="block text-sm font-medium text-gray-700">Archivo</label>
                            <input type="file" wire:model="file" id="file" class="w-full p-3 border border-gray-300 rounded-md mt-1" />
                            @error('file') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    @endif

                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                        <input type="text" wire:model="description" id="description" class="w-full p-3 border border-gray-300 rounded-md mt-1" />
                        @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600">
                            {{ $editing ? 'Actualizar' : 'Subir' }}
                        </button>
                        <button type="button" wire:click="toggleModal" class="bg-red-500 text-white px-4 py-2 rounded-md ml-2">
                            Cancelar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
