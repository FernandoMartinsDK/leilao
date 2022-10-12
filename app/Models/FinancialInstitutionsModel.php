<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialInstitutionsModel extends Model
{
    use HasFactory;
    protected $table = 'financial_institutions';

    protected $fillable = [
        'cnpj',
        'name',
        'created_at',
        'updated_at'
    ];

    //Relations
    public function auction(){
        return $this->hasMany(AuctionModel::class);
    }
}
