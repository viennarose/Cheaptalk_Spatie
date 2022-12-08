<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    public $search;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public function loadPosts(){
        $query = Post::orderBy('category_id')
            ->search($this->search);

        // if($this->service != 'all'){
        //     $query->where('service', $this->service);
        // }

        $posts = $query->paginate(5);
        return compact('posts');
    }

    public function render()
    {
        $posts = Post::where('post', 'like', '%'.$this->search.'%')
        ->orderBy('category_id', 'desc')->paginate(5);
        return view('livewire.posts.index', compact('posts'), $this->loadPosts());
    }
}
