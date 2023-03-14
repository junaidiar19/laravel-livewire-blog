<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Category;
use Livewire\Component;

class ExploreIndex extends Component
{
    public $category;

    public function render()
    {
        $params = [
            'category' => $this->category,
        ];

        $articles = Article::where('is_published', 1)->filter($params)->latest()->paginate(12);
        $categories = Category::all();

        return view('livewire.explore-index', compact('articles', 'categories'))->extends('layouts.app');
    }

    public function handleCategory($value = null)
    {
        $this->category = $value;
    }
}
