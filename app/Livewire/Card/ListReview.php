<?php

namespace App\Livewire\Card;

use Livewire\Component;

class ListReview extends Component
{
    public $item = [];

    public function render()
    {
        return view('livewire.card.list-review', [
            'item' => $this->item,
        ]);
    }
}
