<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;

class Create extends Component
{
    public $user_id, $category_id, $post, $user;

    public function createPost(){
        $this->validate([
            'category_id' => ['required'],
            'post' => ['required', 'string'],
        ]);


        $posts = Post::create([
            'user_id' =>auth()->user()->id,
            'category_id' => $this->category_id,
            'post' => $this->post,
        ]);

        return redirect('/posts')->with('message', 'Created Successfully');
    }
    public function render()
    {
        $categories = Category::get();
        return view('livewire.posts.create', compact('categories'));
    }
}
