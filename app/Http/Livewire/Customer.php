<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Helpers\Helper;
use App\Models\Customer as Customers;

class Customer extends Component
{

    public $customer_id, $firstname, $lastname, $mobile, $address;

    // public $updateCustomer = false;

    // protected $listeners = [
    //     'deleteCustomer' => 'destroy'
    // ];

    protected $rules = [
        'customer_id' => 'required',
        'firstname' => 'required',
        'lastname' => 'required',
        'mobile' => 'required|min:10|unique',
        'address' => 'required|max:500'
    ];


    public function render()
    {
        return view('livewire.customer.index');
    }

    public function resetFields(){
$this->customer_id = '';
$this->firstname = '';
$this->lastname = '';
$this->mobile = '';
$this->address = '';
    }

    public function store(Request $request){
        try{

            $customer_id = Helper::IDGenerator(new Customers(), 'customer_id', 4, 'CUS');

            $customer = new Customers();
            $customer->customer_id = $customer_id;
            $customer->firstname = $request->firstname;
            $customer->lastname = $request->lastname;
            $customer->mobile = $request->mobile;
            $customer->address = $request->address;
           
            $customer->save();

            // Set Flash Message
            session()->flash('success','Customer Added Successfully!!');
 
            // Reset Form Fields After Creating Post
            $this->resetFields();

        }
    

    catch(\Exception $e){

         // Set Flash Message
         session()->flash('error','Something goes wrong while  adding Customer!!');
 
         // Reset Form Fields After Creating Post
         $this->resetFields();

    }
}

}
