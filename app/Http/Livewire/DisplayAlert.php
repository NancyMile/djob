<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DisplayAlert extends Component
{
    public $message;

    public function render()
    {
        return view('livewire.display-alert');
    }
}
