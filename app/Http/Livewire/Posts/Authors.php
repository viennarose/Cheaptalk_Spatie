<?php

namespace App\Http\Livewire\Posts;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Authors extends Component
{
    public $search;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public function loadPosts(){
        $query = User::orderBy('name')
            ->search($this->search);

        $users = $query->paginate(5);
        return compact('users');
    }
    public function render()
    {

        $users = User::where('name', 'like', '%'.$this->search.'%')->orderBy('name', 'desc')->paginate(3);
        return view('livewire.posts.authors', compact('users'), $this->loadPosts());
    }
}
