<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JudicialInformationsModel extends Model
{
    use HasFactory;
    protected $table = 'immobiles';

    protected $fillable = [
        'process',
        'judicial_circuit',
        'judge',
        'exequent',
        'executed',
    ];

    //Relations
    public function immobile(){
        return $this->hasOne(ImmobileModel::class);
    }
}
