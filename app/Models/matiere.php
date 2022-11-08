<?php

namespace App\Models;

use App\Models\User;
use App\Models\Livre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Matiere extends Model
{
    use HasFactory;
    protected $fillable = [
        'designation',
        'status',
    ];
    public function users(){
        return $this->belongsToMany(User::class);
    }
    public function livres(){
        return $this->hasMany(Livre::class);
    }
}
