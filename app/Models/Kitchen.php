<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kitchen extends Model
{
    use HasFactory;

    protected $fillable = ["productid", "customername", "mobile", "productname", "itemquantity", "productprice", "totalprice", "ordertime", "orderdate", ];

    protected $table = 'kitchen';
    
}
