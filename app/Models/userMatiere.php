<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userMatiere extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'matiere_id'
    ];
}
