<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DisplayVacancy extends Component
{
    public $vacancy;

    public function render()
    {
        return view('livewire.display-vacancy');
    }
}
