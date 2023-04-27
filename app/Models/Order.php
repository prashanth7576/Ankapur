<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // protected $fillable = ['orderid', 'customerid', 'customername','mobile', 'quantity', 'price', 'ordertime', 'orderdate'];

    protected $fillable = ["orderid", "productid", "customername", "mobile", "productname", "itemquantity", "productprice", "totalprice", "ordertime", "orderdate" ];

    protected $table = 'orders';
}
