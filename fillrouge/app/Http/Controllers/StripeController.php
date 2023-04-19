<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Compaign;
use App\Models\Soutien;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function index()
    {
        return view('compaigns.index');
    }

    public function checkout(Compaign $compaign, Request $request)
    {
        $attributes = request()->validate([
            'amount' => 'required|numeric|min:1',
            'compaign_id' => 'required',
        ]);
        $compaign_id = $attributes['compaign_id'];
        $amount_price = $attributes['amount'] * 100;
        $data = [
            'amount' => $attributes['amount'],
            'compaign_id' => $attributes['compaign_id'],
        ];

        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'unit_amount' => $amount_price,
                        'product_data' => [
                            'name' => 'donate new',
                        ],
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('success', $data),
            'cancel_url' => route('home'),
        ]);
        return redirect()->away($session->url);
    }

    public function success(Compaign $compaign, Request $request)
    {
        $soutienData = [
            'amount' => $request->input('amount'),
            'compaign_id' => $request->input('compaign_id'),
        ];

        if (auth()->check()) {
            $soutienData['user_id'] = auth()->id();
        }

        DB::insert(
            'insert into soutiens (amount, compaign_id, user_id) values (?, ?, ?)',
            [
                $request->input('amount'),
                $request->input('compaign_id'),
                auth()->id(),
            ]
        );

        return redirect('/');
    }
}
