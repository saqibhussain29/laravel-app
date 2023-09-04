<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Class_;

class Student extends Model
{   
    use HasFactory;

    protected $fillable=[
        'name',
        'father_name',
        'mother_name',
        'class',
        'address',
        'school',
        'contact',
        'image',
    ];
}
