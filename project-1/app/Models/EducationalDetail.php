<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalDetail extends Model
{
    use HasFactory;
    protected  $table = 'educational_details';
    protected  $fillable = ['user_id','program', 'batch','passing_year','university'];

}
