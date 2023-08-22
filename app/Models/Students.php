<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'first_name',
        'middle_name',
        'last_name',
        'student_id',
        'username',
        'password',
        'course',
        ];
}
