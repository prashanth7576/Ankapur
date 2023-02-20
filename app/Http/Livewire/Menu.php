<?php

namespace App\Http\Livewire;

use App\Models\Products as Product;
use Livewire\Component;

class Menu extends Component
{
    public $menu;

    public function render()
    {

        $this->menu = Product::all();

        return view('livewire.menu');
    }
}
