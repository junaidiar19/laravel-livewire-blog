<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Category;

class ArticleCreate extends Component
{
    public function render()
    {
        $categories = Category::all();

        return view('livewire.user.article-create', compact('categories'));
    }
}
