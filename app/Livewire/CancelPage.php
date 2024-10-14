<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Url;
use Livewire\Component;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class CancelPage extends Component
{
    #[Url]
    public $session_id;



    public function render()
    {
        $latestOrder = Order::where('user_id', Auth::user()->id)->latest()->first();

        if ($this->session_id) {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $session_info = Session::retrieve($this->session_id);

            if ($session_info->payment_status != 'paid') {
                $latestOrder->payment_status = 'failed';
                $latestOrder->save();
            }
        }
        return view('livewire.cancel-page');
    }
}
