<?php

namespace App\Livewire\Modal;

use App\Models\Evidence;
use Livewire\Component;
use Livewire\WithFileUploads;

class EvidenceUploadModal extends Component
{
    use WithFileUploads;

    public $open = false;
    public $file;
    public $description;
    public $editing = false;
    public $evidenceId;

    public function toggleModal()
    {
        $this->reset(['file', 'description', 'evidenceId', 'editing']);
        $this->open = !$this->open;
    }

    public function getEvidences()
    {
        return Evidence::all();
    }

    public function submitEvidence()
    {
        $rules = [
            'description' => 'required|string|max:255',
        ];

        if (!$this->editing) {
            $rules['file'] = 'required|file|mimes:jpeg,png,jpg,pdf|max:2048';
        }

        $this->validate($rules);

        if ($this->editing) {
            $evidence = Evidence::findOrFail($this->evidenceId);
            $evidence->description = $this->description;

            if ($this->file) {
                \Storage::disk('public')->delete($evidence->file_path);
                $filePath = $this->file->store('evidencias', 'public');
                $evidence->file_path = $filePath;
                $evidence->file_type = $this->file->getClientMimeType();
            }

            $evidence->save();
            session()->flash('message', 'Evidencia actualizada correctamente.');
        } else {
            $filePath = $this->file->store('evidencias', 'public');
            Evidence::create([
                'user_id' => auth()->id(),
                'file_type' => $this->file->getClientMimeType(),
                'file_path' => $filePath,
                'description' => $this->description,
            ]);
            session()->flash('message', 'Evidencia cargada correctamente.');
        }

        $this->reset(['file', 'description', 'evidenceId', 'editing']);
        $this->toggleModal();
    }

    public function editEvidence($id)
    {
        $evidence = Evidence::findOrFail($id);
        $this->evidenceId = $evidence->id;
        $this->description = $evidence->description;
        $this->editing = true;
        $this->open = true;
    }

    public function deleteEvidence($id)
    {
        $evidence = Evidence::findOrFail($id);
        \Storage::disk('public')->delete($evidence->file_path);
        $evidence->delete();

        session()->flash('message', 'Evidencia eliminada correctamente.');
    }

    public function render()
    {
        return view('livewire.modal.evidence-upload-modal', [
            'evidencias' => $this->getEvidences()
        ]);
    }
}
