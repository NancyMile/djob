<?php

namespace App\Http\Livewire;

use App\Models\Vacancy;
use Livewire\Component;

class DisplayVacancies extends Component
{
    public function render()
    {
        $vacancies = Vacancy::where('user_id', auth()->user()->id)->paginate(10);

        return view('livewire.display-vacancies',[
            'vacancies' => $vacancies
        ]);
    }
}
