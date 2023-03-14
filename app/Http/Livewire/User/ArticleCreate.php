<?php

namespace App\Http\Livewire\User;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;

class ArticleCreate extends Component
{
    public $title;
    public $category;

    public function render()
    {
        $categories = Category::all();

        return view('livewire.user.article-create', compact('categories'));
    }

    public function store()
    {
        // validation
        $this->validate([
            'title' => 'required',
            'category' => 'required',
        ]);

        // insert to article
        Article::create([
            'title' => $this->title,
            'slug' => str()->slug($this->title),
            'category_id' => $this->category,
            'is_published' => 0,
            'user_id' => auth()->id(),
        ]);

        // emit success
        $this->emit('article-stored');
    }
}
