<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionSubmission extends Model
{
    use HasFactory;

    protected $fillable = [

        'competition_id',

        'name',

        'email',

        'image',

        'title',

        'description',

        'file',

        'status',

        'is_winner',

        'winner_position',

    ];

    // Competition Relation

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }
}
