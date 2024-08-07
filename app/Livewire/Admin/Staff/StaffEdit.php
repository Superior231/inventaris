<?php

namespace App\Livewire\Admin\Staff;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class StaffEdit extends Component
{
    public $password, $user_id;

    #[Validate('required')]
    public $name;

    #[Validate('required')]
    public $email;

    // Layouts
    #[Layout('layouts.admin', [
        'title' => 'Warehouse - Tambah Staff',
        'active' => 'staff'
    ])]


    public function mount($id)
    {
        $this->user_id = $id;
        $user = User::find($id);

        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function save()
    {
        $this->validate();

        if (!empty($this->password)) {
            User::find($this->user_id)->update([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password)
            ]);

        } else {
            User::find($this->user_id)->update([
                'name' => $this->name,
                'email' => $this->email
            ]);
        }
        session()->flash('success', 'Staff berhasil diedit!');
        
        return $this->redirectRoute('admin.staff', navigate: true);
    }


    public function render()
    {
        return view('livewire.admin.staff.staff-edit');
    }
}
