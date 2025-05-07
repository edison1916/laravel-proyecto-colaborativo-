<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterComponent extends Component
{
    
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    // Reglas de validación
    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed', // `confirmed` se usa para comparar con `password_confirmation`
    ];

    // Mensajes de validación personalizados
    protected $messages = [
        'password.confirmed' => 'Las contraseñas no coinciden.',
    ];

    // Método para manejar el registro
    public function register()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('message', 'Registro exitoso. Ahora puedes iniciar sesión.');

        return redirect()->route('login'); // Redirigir a la página de login
    }

    public function render()
    {
        return view('livewire.auth.register-component');
    }

    
}
