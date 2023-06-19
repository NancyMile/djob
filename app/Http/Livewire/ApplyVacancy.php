<?php

namespace App\Http\Livewire;

use App\Models\Vacancy;
use Livewire\Component;
use Livewire\WithFileUploads;

class ApplyVacancy extends Component
{
    public $resume;
    public $vacancy;

    protected $rules = [
        'resume' => 'required|mimes:pdf'
    ];

    use WithFileUploads;


    public function mount(Vacancy $vacancy)
    {
        //dd($vacancy);
        $this->vacancy = $vacancy;
    }


    public function apply()
    {
        $data = $this->validate();

        //save resume on disk
        $resume = $this->resume->store('public/resumes');
        //dd($resume);//"public/resumes/resume.pdf"
        $data['resume'] = str_replace('public/resume/','',$resume);

        //create applycant to vacancy
        $this->vacancy->applicants()->create([
            'user_id' => auth()->user()->id,
            'resume' => $data['resume']
        ]);

        //create notification and send email

        //display a success message
    }

    public function render()
    {
        return view('livewire.apply-vacancy');
    }
}
