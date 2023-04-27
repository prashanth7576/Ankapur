<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ["customerid", "productid", "productname", "productprice", "quantity",  "category", "description", 'price'];

    protected $table = 'carts';
}
