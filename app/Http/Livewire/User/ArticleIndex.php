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

    protected $listeners = [
        'article-stored' => 'articleStored',
        'article-updated' => 'articleUpdated',
    ];

    public function render()
    {
        $params = [
            'search' => $this->search,
        ];

        $articles = Article::with('category')->where('user_id', auth()->id())->filter($params)->latest()->paginate($this->row);

        return view('livewire.user.article-index', compact('articles'))->extends('layouts.app');
    }

    public function articleStored()
    {
        // alert success after create article
        session()->flash('success', 'Article successfully created.');
    }

    public function edit($id)
    {
        // get article by id
        $article = Article::findOrFail($id);

        // set is edit to true
        $this->isEdit = true;

        // send article to emit
        $this->emit('edit-article', $article);
    }

    public function articleUpdated()
    {
        // set is edit to false
        $this->isEdit = false;

        // alert success after update article
        session()->flash('success', 'Article successfully updated.');
    }

    public function articlePublish($id, $is_published)
    {
        // get article by id
        $article = Article::findOrFail($id);

        // update published
        $article->update([
            'is_published' => !$is_published,
        ]);

        // alert success
        session()->flash('success', !$is_published ? 'Article is Publish!' : 'Article is Draft!');
    }

    public function articleDelete($id)
    {
        // delete article
        Article::destroy($id);

        // alert success
        session()->flash('success', 'Article successfully deleted.');
    }
}
