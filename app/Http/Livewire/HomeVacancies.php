<?php

namespace App\Http\Livewire;

use App\Models\Vacancy;
use Livewire\Component;

class HomeVacancies extends Component
{
    public $word;
    public $category;
    public $salary;

    protected $listeners = ['gosearch' => 'filterSearch'];
    public  function filterSearch($word, $category, $salary)
    {
        //dd('parent component');
        $this->word = $word;
        $this->category = $category;
        $this->salary = $salary;
    }

    public function render()
    {
        //$vacancies = Vacancy::all();
        $vacancies = Vacancy::when($this->word, function($query){
            $query->where('title','LIKE',"%".$this->word."%");
        })->get();

        return view('livewire.home-vacancies',[
            'vacancies' => $vacancies
        ]);
    }
}
