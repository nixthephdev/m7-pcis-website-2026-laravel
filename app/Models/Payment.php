<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = []; // Allow mass assignment

    // Relationship: A payment belongs to an Enrollment (Student)
    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }
}