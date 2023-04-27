<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Helpers\Helper;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // $data = Customer::where([
        //     ['mobile', '!=', Null],
        //     [function ($query) use ($request) {
        //         if (($term = $request->term)) {
        //             $query->orWhere('mobile',  'LIKE', '%' . $term . '%')->get();
                    
        //         }
        //     }]
        // ])

        //     ->orderBy("id", "desc");

        // // $data = Customer::where('mobile', Input::get('mobile'))->get();
        // $customers = Customer::latest()->get();


        $search = $request['search'] ?? "";
        if($search != ""){
            $customers = Customer::where('mobile', '=', $search)->get();

        }else{
            $customers = Customer::all();

        }
        return view('customers.index', compact('customers', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $customerid = Helper::IDGenerator(new Customer(), 'customerid', 4, 'CUS');

        $customer = new Customer();
        $customer->customerid = $customerid;
        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->mobile = $request->mobile;
        $customer->address = $request->address;
        $customer->save();

        // $request->validate([
        //     'firstname' => 'required',
        //     'lastname' => 'required',
        //     'mobile' => 'required|max:10|unique:customers',
        //     'address' => 'required|max:500'

        // ]);

        // Customer::create($request->all());

        return back()->with('success', 'cusmoter added successfully');

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
    public function edit(string $id, Customer $customer)

    {

        $customer = Customer::find($id);
        return view('customers.edit', compact('customer'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        // $request->validate([
        //     'firstname' => 'required',
        //     'lastname' => 'required',
        //     'mobile' => 'required|max:10|unique:customers',
        //     'address' => 'required|max:500'

        // ]);

        // $customer->update($request->all());

        $customer = Customer::find($id);
        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->mobile = $request->mobile;
        $customer->address = $request->address;
        $customer->update();

        return redirect('customers')->with('success', 'customer details updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id, Customer $customer)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return back()->with('success', 'customer deleted successfully');
    }

}
