<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //call the methos of policy as the stance was not required on the methos, we add the model here Vacancy::class
        $this->authorize('viewAny', Vacancy::class);
        return view('vacancies.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create',Vacancy::class);
        return view('vacancies.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacancy $vacancy)
    {
        return view('vacancies.show',[
            'vacancy' => $vacancy
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacancy $vacancy)
    {
        $this->authorize('update', $vacancy);
        //Thasnk to the relation route model binding  we can call vacancy model
        //dd($vacancy);
        return view('vacancies.edit',[
            'vacancy' => $vacancy
        ]);
    }
}
