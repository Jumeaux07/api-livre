<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dossier extends Model
{
    use HasFactory;
    protected $fillable =[
        'doc1',
        'user_id'
    ];
}
