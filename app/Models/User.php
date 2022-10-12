<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'view_name',
        'cpf',
        'cnpj',
        'date_birth',
        'telephone',
        'type_person_id',
        'active',
        'name',
        'email',
        'profile_id',
        'state_registration',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Relations
    public function address(){
        return $this->belongsTo(AddressModel::class);
    }

    public function types_person(){
        return $this->belongsTo(TypePersonModel::class);
    }

    public function bid(){
        return $this->hasMany(BidModel::class);
    }

    public function auction_winner(){
        return $this->hasMany(AuctionWinnerModel::class);
    }

    public function profile(){
        return $this->belongsTo(ProfileModel::class);
    }

}
