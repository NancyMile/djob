<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class AplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Vacancy $vacancy)
    {
        //dd('Applicants');
        return view('applicants.index',[
            'vacancy' => $vacancy,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Applicant $applicant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Applicant $applicant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Applicant $applicant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Applicant $applicant)
    {
        //
    }
}
