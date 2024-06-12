<?php

namespace App\Livewire\Admin\Staff;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class StaffCreate extends Component
{
    #[Validate('required')]
    public $name, $password;

    #[Validate('required|unique:users')]
    public $email;

    // Layouts
    #[Layout('layouts.admin', [
        'title' => 'Warehouse - Tambah Staff',
        'active' => 'staff'
    ])]


    public function save()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'roles' => 'Staff'
        ];

        User::create($data);
        session()->flash('success', 'Staff berhasil dibuat!');
        
        return $this->redirectRoute('admin.staff', navigate: true);
    }

    
    public function render()
    {
        return view('livewire.admin.staff.staff-create');
    }
}
