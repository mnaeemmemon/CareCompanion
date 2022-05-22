<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    // use HasFactory;
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "admin";

    protected $guard = 'admin';

    public function account()
    {
        return $this->HasOne(Account::class,'id','account_id');
    }
}



// class Admin extends Model
// {
//     use HasFactory;

//     protected $table = "admin";

//     protected $guard = 'admin';
// }
