<?php

namespace App\Http\Livewire\User;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;

class ArticleEdit extends Component
{
    public $articleId;
    public $title;
    public $category;

    protected $listeners = [
        'edit-article' => 'showArticle',
    ];

    // rules of validation
    protected $rules = [
        'title' => 'required',
        'category' => 'required',
    ];

    public function render()
    {
        $categories = Category::all();
        
        return view('livewire.user.article-edit', compact('categories'));
    }

    public function showArticle($article)
    {
        $this->articleId = $article['id'];
        $this->title = $article['title'];
        $this->category = $article['category_id'];
    }

    public function update()
    {
        // validation
        $this->validate();

        // get article by id
        $article = Article::find($this->articleId);

        // update article
        $article->update([
            'title' => $this->title,
            'category' => $this->category,
        ]);

        // emit success
        $this->emit('article-updated');
    }
}
