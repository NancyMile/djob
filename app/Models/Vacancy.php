<?php

namespace App\Models;

use DateTime;
use App\Models\Applicant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacancy extends Model
{
    use HasFactory;

    protected $casts = ['last_date' => 'datetime'];

    protected $fillable = [
        'title',
        'salary_id',
        'category_id',
        'company',
        'last_date',
        'description',
        'image',
        'user_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function salary()
    {
        return $this->belongsTo(Salary::class);
    }

    public function applicants()
    {
        return $this->hasMany(Applicant::class);
    }
}
