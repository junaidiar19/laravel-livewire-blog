<?php

namespace App\Http\Livewire\User;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleIndex extends Component
{
    public $search;
    public $row = 10;

    public $isEdit = false;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $params = [
            'search' => $this->search,
        ];

        $articles = Article::with('category')->latest()->paginate($this->row);

        return view('livewire.user.article-index', compact('articles'))->extends('layouts.app');
    }
}
