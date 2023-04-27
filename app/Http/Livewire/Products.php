<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Products as Product;
use Illuminate\Http\Request;


class Products extends Component
{
    
    public $productname, $productprice, $category, $description, $product, $product_id;

    public $updateProduct = false;

    protected $listeners = [
        'deleteProduct' => 'destroy'
    ];

    protected $rules = [
        'productname' => 'required',
        'productprice' => 'required',
        // 'image' => 'required',
        'category' => 'required',
        'description' => 'required',
    ];

    public function render()
    {
        $this->product = Product::latest()->get();
        return view('livewire.products.index');
    }

    public function resetFields(){
        $this->productname = '';
        $this->productprice = '';
        // $this->image = '';
        $this->category = '';
        $this->description = '';
    }

    public function store(Request $request){

        try{
            // Create Post

            // Product::create($validateData);
            Product::create([
                'productname'=>$this->productname,
                'productprice'=>$this->productprice,
                // 'image'=>$this->image->store('items', 'public'),
                'category'=>$this->category,
                'description'=>$this->description,
                
            ]);
     
            // Set Flash Message
            session()->flash('success','Product Added Successfully!!');
 
            // Reset Form Fields After Creating Post
            $this->resetFields();
        }catch(\Exception $e){
            // Set Flash Message
            session()->flash('error','Something goes wrong while  adding product!!');
 
            // Reset Form Fields After Creating Post
            $this->resetFields();
        }
    }


    public function edit($id){
        $product = Product::findOrFail($id);
        $this->productname =  $product->productname;
        $this->productprice = $product->productprice;
        // $this->image = $product->image;
        $this->category = $product->category;
        $this->description = $product->description;
        
        $this->product_id = $product->id;
        $this->updateProduct = true;
    }
 


    public function cancel()
    {
        $this->updateProduct = false;
        $this->resetFields();
    }

        
    public function update(){
 
        // Validate request
        $this->validate();
 
        try{
 
            // Update post
            Product::find($this->product_id)->fill([
                'productname'=>$this->productname,
                'productprice'=>$this->productprice,
                // 'image'=>$this->image,
                'category'=>$this->category,
                'description'=>$this->description,
               
            ])->save();
 
            session()->flash('success','Product Details Updated Successfully!!');
     
            $this->cancel();
        }catch(\Exception $e){
            session()->flash('error','Something goes wrong while updating Product Details!!');
            $this->cancel();
        }
    }

        public function destroy($id){
            try{
                Product::find($id)->delete();
                session()->flash('success',"product Details Deleted Successfully!!");
            }catch(\Exception $e){
                session()->flash('error',"Something goes wrong while deletingProduct Details!!");
            }
        }

}
