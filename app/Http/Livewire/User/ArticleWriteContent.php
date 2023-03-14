<?php

namespace App\Http\Livewire\User;

use App\Models\Article;
use Livewire\Component;

class ArticleWriteContent extends Component
{
    public $article;
    public $content;

    public function render()
    {
        $article = $this->article;

        return view('livewire.user.article-write-content', compact('article'))->extends('layouts.app');
    }

    public function mount($id)
    {
        $this->article = Article::whereUserId(auth()->id())->whereId($id)->firstOrFail();
        $this->content = $this->article->content;
    }

    public function save()
    {
        // Save the content to the database
        $this->article->update([
            'content' => $this->content,
        ]);

        // Show a success message
        session()->flash('success', 'Content saved successfully.');
    }
}
