<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KitchenController extends Controller
{
    public function index(){

          $data = DB::select('SELECT * FROM orders WHERE orderid IN   (SELECT orderid FROM orders where (status = "preparing") GROUP BY orderid )');


         return view('kitchen', compact('data'));
    }
}
