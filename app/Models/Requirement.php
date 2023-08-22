<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Comment\Doc;

class Requirement extends Model
{
    use HasFactory;

    protected $fillable = ['doc_description'];

    public function documents(){
        return $this->belongsToMany(Document::class);
    }
}
