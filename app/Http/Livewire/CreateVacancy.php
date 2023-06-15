<?php

namespace App\Http\Livewire;

use App\Models\Salary;
use Livewire\Component;

class CreateVacancy extends Component
{
    public function render()
    {
        //query the db
        $salaries =Salary::all();
        return view('livewire.create-vacancy',[
            'salaries' => $salaries
        ]);
    }
}
