<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    use HasFactory;

    protected $fillable = ["customerid", "orderdate", "orderstatus", "restcode", "mobile", "customername", "customeraddress", "transactionstatus", "orderid", "itemcount", "totalprice", "deliverycharge", "CGST", "SGST", "cashsale" ];

    protected $table = 'reports';
}
