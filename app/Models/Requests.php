<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'id',
        'name_request', 
        'first_name',
        'middle_name',
        'last_name',
        'student_number',
        'purpose',
        'qty_copy',
      
        ];
        
     public function student()
{
     return $this->belongsTo(Students::class);
}
}
