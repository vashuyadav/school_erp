<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassMapping extends Model
{
    use HasFactory;
    protected $fillable = ['class_id','section_id'];

    public function classes(){
        return $this->hasOne(Classes::class, 'id', 'class_id');
    }

    public function sections(){
        return $this->hasOne(Section::class, 'id', 'section_id');
    }
}
