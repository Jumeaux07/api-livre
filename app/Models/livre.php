<?php

namespace App\Models;

use App\Models\User;
use App\Models\Matiere;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livre extends Model
{
    use HasFactory;
    protected $fillable = [
        'sku',
        'nom',
        'points',
        'status',
        'user_id',
        'matiere_id',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function matiere(){
        return $this->belongsTo(Matiere::class);
    }
}
