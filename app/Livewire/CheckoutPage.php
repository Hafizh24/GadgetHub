<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Mail\OrderPlaced;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Stripe\Checkout\Session;
use Stripe\Stripe;


class CheckoutPage extends Component
{

    public function mount()
    {
        $cart_items = CartManagement::getCartItemsFromCookie();
        if (count($cart_items) == 0) {
            return redirect('/products');
        }
    }

    public function checkout()
    {
        $cart_items = CartManagement::getCartItemsFromCookie();

        $line_items = [];
        foreach ($cart_items as $item) {
            $line_items[] = [
                'price_data' => [
                    'currency' => 'idr',
                    'unit_amount' => $item['unit_amount'] * 100,
                    'product_data' => [
                        'name' => $item['name']
                    ],
                    'unit_amount' => $item['total_amount']
                ],
                'quantity' => $item['quantity']
            ];
        }

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->grand_total = CartManagement::calculateGrandTotal($cart_items);
        $order->payment_method = 'stripe';
        $order->payment_status = 'pending';
        $order->status = 'new';
        $order->notes = 'Order placed by ' . Auth::user()->name;



        Stripe::setApiKey(env('STRIPE_SECRET'));
        $sessionCheckout = Session::create([
            'payment_method_types' => ['card'],
            'customer_email' => Auth::user()->email,
            'line_items' => $line_items,
            'mode' => 'payment',
            'success_url' => route('success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('cancelled') . '?session_id={CHECKOUT_SESSION_ID}'
        ]);
        $redirect_url = $sessionCheckout->url;

        $order->save();
        $order->items()->createMany($cart_items);
        CartManagement::clearCartItems();

        return redirect($redirect_url);
    }

    public function render()
    {
        $cart_items = CartManagement::getCartItemsFromCookie();
        $grand_total = CartManagement::calculateGrandTotal($cart_items);

        return view('livewire.checkout-page', compact('cart_items', 'grand_total'));
    }
}
