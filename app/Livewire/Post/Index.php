<?php

namespace App\Livewire\Post;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.post.index',[
            'posts' => Post::latest()->paginate(10),
            'user' => User::firstOrFail(),
        ]);
    }
}
