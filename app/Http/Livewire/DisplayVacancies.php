<?php

namespace App\Http\Livewire;

use App\Models\Vacancy;
use Livewire\Component;

class DisplayVacancies extends Component
{
    ///$listener can add multiple functions that are listeng for an event
    //protected $listeners = ['prueba'];

    // public function prueba($vacancy_id){
    //     dd('Desde prueba '.$vacancy_id);
    // }

    protected $listeners = ['deleteVacancy'];

    public function deleteVacancy(Vacancy $vacancy)
    {
        //dd('Deleting ...'.$vacancy->id);
        $vacancy->delete();
    }

    public function render()
    {
        $vacancies = Vacancy::where('user_id', auth()->user()->id)->paginate(10);

        return view('livewire.display-vacancies',[
            'vacancies' => $vacancies
        ]);
    }
}
