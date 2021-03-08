<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulation extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_owner',
        'token',
        'job_title',
        'cv_file',
        'country',
        'state',
        'name',
    ];

}
