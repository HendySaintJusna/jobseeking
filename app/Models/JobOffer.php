<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_owner',
        'company',
        'token',
        'title',
        'salary',
        'desc',
        'category',
        'keywords',
        'job_country',
        'state_province',
        'city',
        'time_needed',
        'speaking',
        'rank',
    ];


}
