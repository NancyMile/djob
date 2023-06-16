<?php

namespace App\Http\Livewire;

use App\Models\Salary;
use Livewire\Component;
use App\Models\Category;
use App\Models\Vacancy;
use Carbon\Carbon;

class EditVacancy extends Component
{
    public $title;
    public $salary;
    public $category;
    Public $company;
    public $last_date;
    public $description;
    public $image;

    protected $rules = [
        'title' => 'required|string',
        'salary' => 'required',
        'category' => 'required',
        'company' => 'required',
        'last_date' => 'required',
        'description' => 'required'
    ];

    public function mount(Vacancy $vacancy)
    {
        $this->title = $vacancy->title;
        $this->salary = $vacancy->salary_id;
        $this->category = $vacancy->category_id;
        $this->company = $vacancy->company;
        $this->last_date = Carbon::parse( $vacancy->last_date )->format('Y-m-d');
        $this->description = $vacancy->description;
        $this->image = $vacancy->image;
    }

    public function editVacancy()
    {
        $data = $this->validate();
    }

    public function render()
    {
        //query the db
        $salaries = Salary::all();
        $categories = Category::all();
        return view('livewire.edit-vacancy',[
            'salaries' => $salaries,
            'categories' => $categories
        ]);
    }
}
