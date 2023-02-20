<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employes as Employe;
use App\Models\roles as Roles;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Employes extends Component
{

    public $employe, $employeeid, $firstname, $lastname, $mobile, $email,$role, $address, $password, $employe_id, $roles, $user, $user_id;
    public $updateEmploye = false;

    protected $listeners = [
        'deleteEmploye'=>'destroy'
    ];

    protected $rules = [

        'employeeid' => 'required',
        'firstname' => 'required',
        'lastname' => 'required',
        'mobile' => 'required|min:10',
        'email' => 'required|email',
        'role' => 'required',
        'address' => 'required|min:2',
        'password' => 'required|min:8',

    ];
    public function render()
    {
        $this->employe = Employe::latest()->get();
        $this->roles = Roles::all();

        return view('livewire.employes');
    }

    public function resetFields(){
        $this->employeeid = '';
        $this->firstname = '';
        $this->lastname = '';
        $this->mobile = '';
        $this->email = '';
        $this->role = '';
        $this->address = '';
        $this->password = '';
    }

    public function store(){
 
        // Validate Form Request
        $this->validate();
 
        try{
            // Create Post
            Employe::create([
                'employeeid'=>$this->employeeid,
                'firstname'=>$this->firstname,
                'lastname'=>$this->lastname,
                'mobile'=>$this->mobile,
                'email'=>$this->email,
                'role' => $this->role,
                'address'=>$this->address
            ]);




            // $this->password = Hash::make($this->password);

            User::create([

                'name' => $this->firstname, 'email' => $this->email, 'password' => Hash::make($this->password)

            ]);
     
            // Set Flash Message
            session()->flash('success','Employe Onboarded Successfully!!');
 
            // Reset Form Fields After Creating Post
            $this->resetFields();
        }catch(\Exception $e){
            // Set Flash Message
            session()->flash('error','Something goes wrong while onboarding Employe!!');
 
            // Reset Form Fields After Creating Post
            $this->resetFields();
        }
    }


    public function edit($id){
        $employe = Employe::findOrFail($id);
        $this->employeeid =  $employe->employeeid;
        $this->firstname = $employe->firstname;
        $this->lastname = $employe->lastname;
        $this->mobile = $employe->mobile;
        $this->email = $employe->email;
        $this->role = $employe->role;
        $this->address = $employe->address;
        $this->employe_id = $employe->id;
        $this->updateEmploye = true;

        // $user = User::findorFail($id);
        // $this->password = $user->password;
    }
 
    public function cancel()
    {
        $this->updateEmploye = false;
        $this->resetFields();
    }
 
    public function update(){
 
        // Validate request
        $this->validate();
 
        try{
 
            // Update post
            Employe::find($this->employe_id)->fill([
                'employeeid'=>$this->employeeid,
                'firstname'=>$this->firstname,
                'lastname'=>$this->lastname,
                'mobile'=>$this->mobile,
                'email'=>$this->email,
                'role' => $this->role,
                'address'=>$this->address
            ])->save();

            // User::find($this->user_id)->fill([
                
            //     'password'=>$this->password
            // ])->save();
 
 
            session()->flash('success','Employe Details Updated Successfully!!');
     
            $this->cancel();
        }catch(\Exception $e){
            session()->flash('error','Something goes wrong while updating Details!!');
            $this->cancel();
        }
    }

    public function destroy($id){
        try{
            Employe::find($id)->delete();
            session()->flash('success',"Employe Details Deleted Successfully!!");
        }catch(\Exception $e){
            session()->flash('error',"Something goes wrong while deleting Details!!");
        }
    }
 
}
