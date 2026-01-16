<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    // Allow mass assignment for all fields
    protected $guarded = [];

    // AUTOMATICALLY CONVERT JSON TO ARRAY
    protected $casts = [
        'father_details' => 'array',
        'mother_details' => 'array',
        'guardian_details' => 'array',
        'siblings_data' => 'array', // <--- This fixes your error
        'academic_history' => 'array',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}