<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BioData extends Model
{
    use HasFactory;
    protected $fillable = ['position', 'name', 'no_ktp', 'ttl', 'gender', 'religion', 'blood', 'status', 'address_ktp', 'address', 'email', 'no_telp', 'close_person', 'can_work_all_company', 'expected_salary', 'user_id'];

    public function educations()
    {
        return $this->hasMany(Education::class, 'bio_data_id', 'id');
    }

    public function lastEducation()
    {
        return $this->hasOne(Education::class, 'bio_data_id', 'id')->latestOfMany();
    }

    public function trainings()
    {
        return $this->hasMany(Training::class, 'bio_data_id', 'id');
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class, 'bio_data_id', 'id');
    }
}
