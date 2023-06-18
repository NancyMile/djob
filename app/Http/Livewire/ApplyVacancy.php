<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ApplyVacancy extends Component
{
    public $resume;

    protected $rules = [
        'resume' => 'required|mimes:pdf'
    ];

    use WithFileUploads;

    public function apply()
    {
        $data = $this->validate();

        //save resume on disk
        $resume = $this->resume->store('public/resumes');
        //dd($resume);//"public/resumes/resume.pdf"
        $data['resume'] = str_replace('public/resume/','',$resume);


        //create notification and send email

        //display a success message
    }

    public function render()
    {
        return view('livewire.apply-vacancy');
    }
}
