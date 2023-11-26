<?php

namespace App\Livewire\Card;

use Livewire\Component;

class ListToko extends Component
{
    public $items = [];
    public $id = '';

    public function render()
    {
        return view('livewire.card.list-toko', [
            'items' => $this->items,
            'id' => $this->id,
        ]);
    }
}
