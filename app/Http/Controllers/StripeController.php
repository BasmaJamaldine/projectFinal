<?php

namespace App\Http\Controllers;

use App\Models\User;

use Stripe\Checkout\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function submitCoachRequest(Request $request)
    {
        $user = Auth::user();

        if ($user->role !== 'student') {
            return back();
        }

        if ($user->role_request_sent) {
            return back();
        }

        $user->update([
            'requested_role' => true,
            'role_request_status' => 'pending',
            'role_request_sent' => true,
        ]);
        // Optionnel : Vérifiez si l'utilisateur a déjà soumis une demande ou est déjà coach
        $user = $request->user();
        if ($user->role === 'coach') {
            return redirect()->route('dashboard')->with('message', 'Vous êtes déjà coach.');
        }

        Stripe::setApiKey(config('stripe.sk'));

        $line_items = [
            [
                'price_data' => [
                    'currency' => 'mad',
                    'product_data' => [
                        'name' => 'Abonnement pour devenir coach',
                    ],
                    'unit_amount' => 50000, 
                ],
                'quantity' => 1,
            ],
        ];

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $line_items,
            'mode' => 'payment',
            'success_url' => route('coach.success') . '?success=true',
            'cancel_url' => route('coach.cancel') . '?success=false',
        ]);

     
        return redirect()->away($session->url);
    }

    public function paymentSuccess(Request $request)
    {
        if ($request->get('success') === 'true') {

            return redirect()->route('dashboard')->with('message', 'Félicitations, vous êtes maintenant coach !');
        }

        return redirect()->route('dashboard')->with('error', 'Le paiement a échoué ou a été annulé.');
    }

    public function paymentCancel()
    {
        return redirect()->route('dashboard')->with('error', 'Le paiement a été annulé.');
    }
}