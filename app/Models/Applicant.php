<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'vacancy_id',
        'resume'
    ];

    // on table Applicants we have user_id,this relationship brings the info of the user
    public function user(){
        return $this->belongsTo(User::class);
    }
}
