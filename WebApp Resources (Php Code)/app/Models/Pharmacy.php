<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pharmacy extends Authenticatable
{
    // use HasFactory;
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "pharmacy";

    public function handler()
    {
        return $this->HasOne(User::class,'id','user_id');
    }

    public function pharmacist()
    {
        return $this->HasOne(Pharmacist::class,'id','handler_id');
    }

    public function account()
    {
        return $this->HasOne(Account::class,'id','account_id');
    }
}

// class Pharmacy extends Model
// {
//     // use HasFactory;
//     use HasApiTokens, HasFactory, Notifiable;

//     protected $table = "pharmacy";

//     public function handler()
//     {
//         return $this->HasOne(User::class,'id','user_id');
//     }

//     public function account()
//     {
//         return $this->HasOne(Account::class,'id','account_id');
//     }
// }
