<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Salary;
use Doctrine\Inflector\Rules\English\Rules;
use Livewire\Component;

class CreateVacancy extends Component
{
    public $title;
    public $salary;
    public $category;
    Public $company;
    public $last_day;
    public $description;
    public $image;

    protected $rules = [
        'titulo' => 'required|string',
        'salary' => 'required',
        'category' => 'required',
        'company' => 'required',
        'last_day' => 'required',
        'description' => 'required',
        'image' => 'required',
    ];


    public function render()
    {
        //query the db
        $salaries = Salary::all();
        $categories = Category::all();

        return view('livewire.create-vacancy',[
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }
}
