<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMatiere extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'matiere_id'
    ];
}
