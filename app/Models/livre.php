<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    use HasFactory;
    protected $fillable = [
        'sku',
        'nom',
        'points',
        'status',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
