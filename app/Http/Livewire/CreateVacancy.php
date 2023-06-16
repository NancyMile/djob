<?php

namespace App\Http\Livewire;

use App\Models\Salary;
use Livewire\Component;
use App\Models\Category;
use App\Models\Vacancy;
use Livewire\WithFileUploads;
use Doctrine\Inflector\Rules\English\Rules;

class CreateVacancy extends Component
{
    public $title;
    public $salary;
    public $category;
    Public $company;
    public $last_date;
    public $description;
    public $image;

    use WithFileUploads;

    protected $rules = [
        'title' => 'required|string',
        'salary' => 'required',
        'category' => 'required',
        'company' => 'required',
        'last_date' => 'required',
        'description' => 'required',
        'image' => 'required|image|max:1024',
    ];

    public function createVacancy()
    {
        //this will apply the previous rules
        /** si para la validacion los valores se pasan a $datos, si no los errores se muestran en pantalla */
        $data = $this->validate();

        //save the image
        $image = $this->image->store('public/vacancies');
        //dd($image);//"public/vacancies/EZX6NqUJdHkLqD8PqjXo4WBI4l7nU9q3I3LuVFsS.jpg" /
        $data['image'] = str_replace('public/vacancies/','',$image);

        //save vacancy
        // In this case can't access to the reques, but can acess to data
        Vacancy::create([
            'title' => $data['title'],
            'salary_id' => $data['salary'],
            'category_id' => $data['category'],
            'company' => $data['company'],
            'last_date' => $data['last_date'],
            'description' => $data['description'],
            'image' => $data['image'],
            'user_id' => auth()->user()->id,
        ]);

        //display message
        session()->flash('message','The new job has been saved!');

        //redirect
        return redirect()->route('vacancies.index');
    }

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
