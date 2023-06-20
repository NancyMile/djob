<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Salary;
use Livewire\Component;

class VacancyFilter extends Component
{
    public $word;
    public $category;
    public $salary;

    public  function readDataForm()
    {
        //dd('Searching...');
        $this->emit('gosearch',$this->word,$this->category,$this->salary);
    }

    public function render()
    {
        //get salaries and  categories
        $salaries = Salary::all();
        $categories = Category::all();
        return view('livewire.vacancy-filter',[
            'salaries' => $salaries,
            'categories' => $categories,
        ]);
    }
}
