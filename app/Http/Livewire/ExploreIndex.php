<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ExploreIndex extends Component
{
    public function render()
    {
        return view('livewire.explore-index')->extends('layouts.app');
    }
}
