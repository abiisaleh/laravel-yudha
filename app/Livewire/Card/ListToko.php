<?php

namespace App\Livewire\Card;

use Livewire\Component;

class ListToko extends Component
{
    public $items = [];
    public $class = 'bg-white dark:bg-gray-900';
    public $heading = '';
    public $subheading = '';

    public function render()
    {
        return view('livewire.card.list-toko', [
            'items' => $this->items,
            'class' => $this->class,
            'heading' => $this->heading,
            'subheading' => $this->subheading,
        ]);
    }
}
