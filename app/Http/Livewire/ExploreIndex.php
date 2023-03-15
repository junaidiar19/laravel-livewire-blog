<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class ExploreIndex extends Component
{
    public $category;
    public $search;
    public $paginate = 12;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $queryString = ['category', 'search'];

    public function render()
    {
        $params = [
            'search' => $this->search,
            'category' => $this->category,
        ];

        $articles = Article::where('is_published', 1)->filter($params)->latest()->paginate($this->paginate);
        $categories = Category::all();

        return view('livewire.explore-index', compact('articles', 'categories'))->extends('layouts.app');
    }

    public function handleCategory($value = null)
    {
        $this->category = $value;
    }
}
