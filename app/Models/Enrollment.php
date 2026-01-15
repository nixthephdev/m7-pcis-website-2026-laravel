<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
    'applicant_type', 'lrn', 'first_name', 'middle_name', 'last_name', 'nickname', 
    'gender', 'birth_date', 'birth_country', 'city_of_birth', 'religion', 'citizenship',
    'primary_language', 'secondary_language', 'height', 'weight',
    'house_no', 'village', 'barangay', 'city', 'province', 'zip_code', 'country',
    'telephone', 'phone', 'email',
    'birth_order', 'parents_marital_status', 'authorized_pickup',
    'father_data', 'mother_data', 'guardian_data',
    'siblings_data', 'academic_history',
    'health_conditions', 'has_allergies',
    'disciplinary_history', 'special_needs', 'referral_source',
    'grade_level', 'status','reference_no', // <--- ADD THIS LINE
];

protected $casts = [
    'father_data' => 'array',
    'mother_data' => 'array',
    'guardian_data' => 'array',
    'siblings_data' => 'array',
    'academic_history' => 'array',
];
    
}
