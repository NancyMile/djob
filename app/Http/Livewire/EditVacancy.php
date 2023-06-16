<?php

namespace App\Http\Livewire;

use App\Models\Salary;
use Livewire\Component;
use App\Models\Category;
use App\Models\Vacancy;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class EditVacancy extends Component
{
    public $vacancy_id;
    public $title;
    public $salary;
    public $category;
    Public $company;
    public $last_date;
    public $description;
    public $image;
    public $new_image;

    use WithFileUploads;

    protected $rules = [
        'title' => 'required|string',
        'salary' => 'required',
        'category' => 'required',
        'company' => 'required',
        'last_date' => 'required',
        'description' => 'required',
        'new_image' => 'nullable|image|max:1024'
    ];

    public function mount(Vacancy $vacancy)
    {
        $this->vacancy_id = $vacancy->id;
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

        //check i thre is a new image
        if($this->new_image){
            $image =$this->new_image->store('public/vacancies');
            $data['image'] = str_replace('public/vacancies/','',$image);
        }

        //find the vacancy to be dited
        $vacancy = Vacancy::find($this->vacancy_id);

        //asign the value, we ar replacing the values of the  existing  ones on db
        $vacancy->title =  $data['title'];
        $vacancy->salary_id = $data['salary'];
        $vacancy->category_id = $data['category'];
        $vacancy->company = $data['company'];
        $vacancy->last_date = $data['last_date'];
        $vacancy->description = $data['description'];
        $vacancy->image =$datos['image'] ?? $vacancy->image; //if thre is anew image assign that one  otherwise assign the one on db

        //save the changes
        $vacancy->save();

        //redirect
        session()->flash('message','The changes has been saved!');
        return redirect()->route('vacancies.index');
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
