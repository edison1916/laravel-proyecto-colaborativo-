<?php

use App\Livewire\Auth\RegisterComponent;
use App\Livewire\Counter;
use App\Livewire\Auth\Login;
use App\Livewire\Modal\EvidenceUploadModal;
use Illuminate\Support\Facades\Route;

// Ruta de login (solo usuarios invitados)
Route::middleware('guest')->get('/login', Login::class)->name('login');

// Ruta de registro (solo usuarios invitados)


// Rutas protegidas (solo usuarios autenticados)
Route::middleware('auth')->group(function () {
    // Ruta principal protegida (por ejemplo: dashboard o el contador)
    Route::get('/', Counter::class)->name('home');
    Route::get('/register', RegisterComponent::class)->name('register');
    Route::get('/evidencias', EvidenceUploadModal::class)->name('evidencias');

    // Aquí puedes agregar más rutas que requieren login
});
