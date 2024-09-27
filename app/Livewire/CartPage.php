<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use Livewire\Component;

class CartPage extends Component
{
    public $cart_items = [];

    public function mount()
    {
        $this->cart_items = CartManagement::getCartItemsFromCookie();
    }

    public function render()
    {
        // return view('livewire.cart-page');
        dd($this->cart_items);
    }
}