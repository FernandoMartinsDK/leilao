<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImmobileTypeModel extends Model
{
    use HasFactory;
    protected $table = 'immobiles';

    protected $fillable = [
        'type'
    ];

    //Relations
    public function immobile(){
        return $this->hasMany(ImmobileModel::class);
    }
}
