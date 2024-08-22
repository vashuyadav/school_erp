<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Classes extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'classes';
    protected $dates = ['deleted_at'];
    protected $fillable = ['name','start_date','end_date'];
}
