<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class ExploreIndex extends Component
{
    public function render()
    {
        $articles = Article::where('is_published', 1)->latest()->paginate(12);

        return view('livewire.explore-index', compact('articles'))->extends('layouts.app');
    }
}
