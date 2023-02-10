<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\roles as Role;

class Roles extends Component
{

    
    public $roles, $role, $description, $role_id;

    public $updateRole = false; 

      protected $listeners = [
        'deleteRole'=>'destroy'
    ];


     protected $rules = [

        'role' => 'required',
        'description' => 'required',
       

    ];


    public function render()
    {
         $this->roles = Role::latest()->get();
        return view('livewire.roles');
    }


      public function resetFields(){
        $this->role = '';
        $this->description = '';
       
    }


     public function store(){
 
        // Validate Form Request
        $this->validate();
 
        try{
            // Create Post
            Role::create([
                'role'=>$this->role,
                'description'=>$this->description,
                
            ]);
     
            // Set Flash Message
            session()->flash('success','Role Added Successfully!!');
 
            // Reset Form Fields After Creating Post
            $this->resetFields();
        }catch(\Exception $e){
            // Set Flash Message
            session()->flash('error','Something goes wrong while adding Role!!');
 
            // Reset Form Fields After Creating Post
            $this->resetFields();
        }
    }


     public function edits($id){
        $roles = Role::findOrFail($id);
        $this->role =  $roles->role;
        $this->description = $roles->description;
     
        $this->role_id = $roles->id;
        $this->updateRole = true;
    }
 
    public function cancel()
    {
        $this->updateRole = false;
        $this->resetFields();
    }
 
    public function update(){
 
        // Validate request
        $this->validate();
 
        try{
 
            // Update post
            Role::find($this->role_id)->fill([
                'role'=>$this->role,
                'description'=>$this->description,
               
            ])->save();
 
            session()->flash('success','Role Updated Successfully!!');
     
            $this->cancel();
        }catch(\Exception $e){
            session()->flash('error','Something goes wrong while updating Role!!');
            $this->cancel();
        }
    }

    public function destroy($id){
        try{
            Role::find($id)->delete();
            session()->flash('success'," Role  Deleted Successfully!!");
        }catch(\Exception $e){
            session()->flash('error',"Something goes wrong while deleting Role!!");
        }
    }
}
