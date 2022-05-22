<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pharmacist extends Authenticatable
{
    // use HasFactory;
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "pharmacist";

    protected $guard = 'pharmacist';

    public function pharmacy()
    {
        return $this->HasOne(Pharmacy::class,'id','pharmacy_id');
    }
}



// class Pharmacist extends Model
// {
//     use HasFactory;
//     protected $table = "pharmacist";

//     protected $guard = 'pharmacist';
// }
