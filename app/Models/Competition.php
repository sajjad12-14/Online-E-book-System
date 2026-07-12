<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;

    protected $fillable = [

        'title',
        'slug',
        'description',
        'rules',
        'prize',
        'start_date',
        'end_date',
        'image',
        'status',

    ];

    // ==========================
    // Competition Submissions
    // ==========================

    public function submissions()
    {
        return $this->hasMany(CompetitionSubmission::class);
    }
}
