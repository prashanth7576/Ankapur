<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{

    public $menu;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        // $data = Customer::find($id);
        return view('menus.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menus.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $Price= $request->productprice * $request->quantity;

        $menu = new Menu();
        $menu->customerid = $request->customerid;
        $menu->productid = $request->productid;
        $menu->productname = $request->productname;
        $menu->productprice = $request->productprice;
        $menu->quantity = $request->quantity;
        // $menu->productimage = $Productimage;
        $menu->category = $request->category;
        $menu->description = $request->description;
        $menu->price = $Price;
        $menu->save();

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function data($id)
    {
        $data = Customer::find($id);
        $items = Product::find($id);

        $product = Product::all();

        // return $demo = DB::table('carts')->pluck('customername');

        $value = Customer::find($id);
        $user = DB::table('carts')->where('customerid', $value->customerid)->get();

       $list = DB::table('carts')->where('customerid', $value->customerid)->count();

       $report = DB::table('carts')->where('customerid', $value->customerid)->sum(DB::raw('price'));

       $totalquantity = DB::table('carts')->where('customerid', $value->customerid)->sum(DB::raw('quantity'));

        return view('cart', compact('data', 'items', 'id', 'product', 'value', 'user', 'report', 'totalquantity', 'list'));
        
    }

    


}
