<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Helpers\Helper;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $product = Product::latest()->get();
        return view('products.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'productname' => 'required',
        //     'productprice' => 'required',
        //     'category' => 'required',
        //     'description' => 'required|max:1500'

        // ]);

        // Product::create($request->all());

        $request->validate(['productimage' => 'required|mimes:png,jpg,|max:1024']);
       
        $Productimage = $request->productname . '.' . $request->productimage->extension();
       $request->productimage->move('public/products', $Productimage);

        $productid = Helper::IDGenerator( new Product(), 'productid', 4, 'PRD');

        $product = new Product();
        $product->productid = $productid;
        $product->productname = $request->productname;
        $product->productprice = $request->productprice;
        $product->productimage = $Productimage;
        $product->category = $request->category;
        $product->description = $request->description;
        $product->save();

        return back()->with('success', 'Product added successfully');

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
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $product = Product::find($id);
        $product->productid = $request->productid;
        $product->productname = $request->productname;
        $product->productprice = $request->productprice;
        $product->productimage = $request->productimage;
        $product->category = $request->category;
        $product->description = $request->description;
        $product->update();

        return redirect('products')->with('success', 'customer details updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
