<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employes extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'employeeid', 'firstname', 'lastname', 'mobile', 'email','role', 'address', 'password'
    ];

    public $timestamps = true;

}
