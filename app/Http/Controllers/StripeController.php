<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\Exception\SignatureVerificationException;
use Stripe\Webhook;

class StripeController extends Controller
{

    public function session(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $userEmail = auth()->user()->email ?? null;

        $eventId = $request->get('id');
        $eventName = $request->get('eventName');
        $ticketQuantity = $request->get('quantity');
        $eventPrice = $request->get('eventPrice');
        $totalPrice = $eventPrice;
        $total = $totalPrice * 100;

        //dd($userEmail);

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
            'metadata' => [
                'user_email' => $userEmail, // Assuming user is authenticated
                'event_id' => $eventId, // Assuming event ID is passed in the request
            ],
        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {
        return "Thanks for your order";
    }

    public function webhook(Request $request)
    {
        // Log the incoming webhook payload
        Log::info('Webhook payload: ' . json_encode($request->all()));

        try {
            // Extract necessary data from the webhook payload
            $payload = json_decode($request->getContent(), true);

            // Check if $payload contains the necessary keys
            if (isset($payload['data']['object'])) {
                // Access the nested object containing payment data
                $paymentData = $payload['data']['object'];

                // Assuming the payment data contains 'id', 'amount', 'currency', and 'status' fields
                $stripeId = $paymentData['id'] ?? null;
                $amount = $paymentData['amount'] ?? null;
                $currency = $paymentData['currency'] ?? null;
                $status = $paymentData['status'] ?? null;

                //get real amount
                $realamount = $amount * 0.01;

                $metadata = $paymentData['metadata'] ?? [];

                // Retrieve user_email from metadata
                $userEmail = $metadata['event_id'] ?? null;

                // Insert the data into the payments table
                $payment = new Payment();
                $payment->stripe_id = $stripeId;
                //$payment->email = $userEmail;
                $payment->amount = $realamount;
                $payment->currency = $currency;
                $payment->status = $status;
                $payment->save();

                // Optionally, you can return a response
                return response()->json(['message' => 'Payment data received and saved successfully']);
            } else {
                // Handle the case where the necessary keys are not found
                Log::error('Invalid webhook payload: ' . json_encode($payload));
                return response()->json(['error' => 'Invalid webhook payload'], 400);
            }
        } catch (\Exception $e) {
            // Log any exceptions that occur during webhook processing
            Log::error('Exception occurred during webhook processing: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred during webhook processing'], 500);
        }
    }
}

