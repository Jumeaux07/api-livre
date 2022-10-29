<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dossier extends Model
{
    use HasFactory;
    protected $fillable =[
        'doc1',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
