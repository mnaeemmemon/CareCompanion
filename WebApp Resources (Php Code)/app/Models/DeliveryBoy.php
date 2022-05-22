<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryBoy extends Model
{
    use HasFactory;
    protected $table = "delivery_boy";

    public function area()
    {
        return $this->HasOne(Area::class,'id','Area_ID');
    }
}
