<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['document_name', 'price'];

    public function requirements(){
        return $this->belongsToMany(Requirement::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }


}
