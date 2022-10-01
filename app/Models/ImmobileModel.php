<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImmobileModel extends Model
{
    use HasFactory;
    protected $table = 'immobiles';

    protected $fillable = [
        'users_id',
        'category_id',
        'city',
        'address',
        'district',
        'cep',
        'immobile_type_id',
        'judicial_information'
    ];

    //Relations
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function immobile_type(){
        return $this->belongsTo(ImmobileTypeModel::class);
    }

    public function judicial_information(){
        return $this->hasOne(JudicialInformationsModel::class);
    }

    public function category(){
        return $this->belongsTo(CategoryModel::class);
    }
}
