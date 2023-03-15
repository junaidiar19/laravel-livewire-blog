<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class ArticleShow extends Component
{
    public $article;

    public function render()
    {
        return view('livewire.article-show')->extends('layouts.app');
    }

    public function mount($slug)
    {
        $this->article = Article::whereSlug($slug)->firstOrFail();   
    }
}
