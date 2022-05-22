<?php

namespace App\Models;
use App\Models\ProductType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "product";
    // protected $guarded = [];

    public $fillable = [
        'name',
        'productType_ID',
        'gram',
        'Manufacture',
        'Formula',
        'Manufacturing_date',
        'Expiry_date',
        'Price',
        'SideEffects',
        'image',
        'prescription_needed',
        'deleted',

    ];

    public function type()
    {
        return $this->HasOne(ProductType::class,'id','productType_ID');
    }

    public function pharmacy()
    {
        return $this->HasOne(Pharmacy::class,'id','pharmacy_id');
    }

    public function orderDetails()
    {
        return $this->HasMany(OrderDetails::class,'product_ID','id');
    }

}
