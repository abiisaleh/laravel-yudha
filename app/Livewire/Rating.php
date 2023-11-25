<?php

namespace App\Livewire;

use Livewire\Component;

class Rating extends Component
{
    public $rating = 0;

    public function render()
    {
        return view('livewire.rating', ['rating' => $this->rating]);
    }
}
