<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ArticleShow extends Component
{
    public function render()
    {
        return view('livewire.article-show')->extends('layouts.app');
    }

    public function mount($slug)
    {
        
    }
}
