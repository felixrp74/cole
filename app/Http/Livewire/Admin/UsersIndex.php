<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search = '';

    public function updatingSearch(){
        $this->resetPage();
    }

 
    public function render()
    {
        $users = User::paginate(); 

        // filtrar publicaciones por tipo de usuario exclusivamente para (admin)
        $users = User::where('tipo_usuario', '=', 'admin') 
                ->latest('created_at') 
                ->paginate();
 
        return view('livewire.admin.users-index', compact('users'));
    }
}
