<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypePersonModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'type'
    ];

    //Relations
    public function user(){
        return $this->hasMany(User::class);
    }
}
