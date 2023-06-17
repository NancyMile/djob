<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ApplyVacancy extends Component
{
    public $resume;

    protected $rules = [
        'resume' => 'required|mines:pdf'
    ];

    public function apply()
    {
        $data = $this->validate();

        //save resume on disk

        //create notification and send email

        //display a success message
    }

    public function render()
    {
        return view('livewire.apply-vacancy');
    }
}
