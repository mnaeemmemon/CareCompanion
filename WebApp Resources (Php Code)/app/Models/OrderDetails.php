<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $table = "orderdetails";

    public function order()
    {
        return $this->HasOne(Order::class,'id','Order_ID');
    }

    public function product()
    {
        return $this->HasOne(Product::class,'id','product_ID');
    }
}
