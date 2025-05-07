<?php

namespace App\Livewire\Modal;

use App\Models\Evidence;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EvidenceList extends Component
{
    use WithFileUploads;

    public $file;
    public $description;
    public $openModal = false; // Controla si el modal está abierto o cerrado

    protected $rules = [
        'file' => 'required|file|mimes:pdf,jpeg,png,jpg|max:10240',
        'description' => 'nullable|string|max:255',
    ];

    public function upload()
    {
        $this->validate();

        // Almacenar el archivo en el directorio "public/evidences"
        $filePath = $this->file->store('evidences', 'public');

        // Crear un nuevo registro de evidencia en la base de datos
        Evidence::create([
            'user_id' => auth()->id(),
            'file_type' => $this->file->getClientMimeType(),
            'file_path' => $filePath,
            'description' => $this->description,
        ]);

        session()->flash('message', 'Evidencia cargada con éxito.');

        // Resetear el formulario y cerrar el modal
        $this->reset();
        $this->openModal = false;
    }

    public function render()
    {
        $evidences = Evidence::where('user_id', auth()->id())->get();
        return view('livewire.modal.evidence-list', compact('evidences'));
    }
}
