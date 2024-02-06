<?php

namespace App\Http\Controllers;
use App\Models\Events;
use App\Models\User;

use Illuminate\Http\Request;

class StripeController extends Controller
{

    public function session(Request $request)
    {
        //dd($request);
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $eventId = $request->get('id');
        $eventName = $request->get('eventName');
        $ticketQuantity = $request->get('quantity');
        $eventPrice = $request->get('eventPrice');
        $totalPrice = $eventPrice;
        $total = $totalPrice * 100;


        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'MYR',
                        'product_data' => [
                            "name" => $eventName,
                        ],
                        'unit_amount' => $total,
                        ],
                        'quantity' => $ticketQuantity,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => route('success'),
                'cancel_url' => route('home'),

        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {
        return "Thanks for your order";
    }

}
