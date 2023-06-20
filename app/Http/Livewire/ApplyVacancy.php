<?php

namespace App\Http\Livewire;

use App\Models\Vacancy;
use App\Notifications\NewApplicant;
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
        $data['resume'] = str_replace('public/resumes/','',$resume);

        //create applycant to vacancy
        $this->vacancy->applicants()->create([
            'user_id' => auth()->user()->id,
            'resume' => $data['resume']
        ]);

        //create notification and send email
        //the method vacancy has the relation recruiter, then by using notify pass the notification
        $this->vacancy->recruiter->notify(new NewApplicant($this->vacancy->id,$this->vacancy->title,auth()->user()->id));

        //display a success message
        session()->flash('message',' Thanks for applying, resume sent!');
        return redirect()->back();
    }


    public function render()
    {
        return view('livewire.apply-vacancy');
    }
}
