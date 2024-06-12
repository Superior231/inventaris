<?php

namespace App\Livewire\Admin\Staff;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class StaffIndex extends Component
{
    // Layouts
    #[Layout('layouts.admin', [
        'title' => 'Warehouse - Staff',
        'active' => 'staff'
    ])]


    public function delete($id)
    {
        $staff = User::find($id);

        $staff->delete();
        session()->flash('success', 'Staff berhasil dihapus!');
    }

    public function render()
    {
        return view('livewire.admin.staff.staff-index', [
            'users' => User::where('roles', 'staff')->get()
        ]);
    }
}
