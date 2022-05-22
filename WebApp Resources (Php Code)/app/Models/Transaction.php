<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = "transactions";

    public function sender()
    {
        return $this->HasOne(Account::class,'id','sender_id');
    }

    public function receiver()
    {
        return $this->HasOne(Account::class,'id','receiver_id');
    }
}
