<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    use HasFactory;
    protected $table = "notifications";

    public function type()
    {
        return $this->HasOne(type_of_note::class,'id','type_of_notification');
    }


    public function user()
    {
        return $this->HasOne(User::class,'id','sender_id');
    }
    public function pharmacist()
    {
        return $this->HasOne(Pharmacist::class,'id','sender_id');
    }


}
