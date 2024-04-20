<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'job',
        'country',
        'description',
        'date_of_birth',
        'address',
        'zip_code',
        'email',
        'phone',
        'cv'
    ];
}

