<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;
    protected $fillable = ['bio_data_id', 'level', 'name_institution', 'major', 'date_graduate', 'grading'];
}
