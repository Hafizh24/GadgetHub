<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Cart Page')]

class CartPage extends Component
{
    public $cart_items = [];

    public function mount()
    {
        $this->cart_items = CartManagement::getCartItemsFromCookie();
    }

    public function removeItem($product_id)
    {
        $this->cart_items = CartManagement::removeCartItem($product_id);
        $this->dispatch('update-cart-count', count($this->cart_items))->to(Navbar::class);
    }

    public function increaseQty($product_id)
    {
        $this->cart_items = CartManagement::incrementQuantityToCartItem($product_id);
    }

    public function decreaseQty($product_id)
    {
        $this->cart_items = CartManagement::decrementQuantityToCartItem($product_id);
    }

    public function render()
    {
        return view('livewire.cart-page');
    }
}