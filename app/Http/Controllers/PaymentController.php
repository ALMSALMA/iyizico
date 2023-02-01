<?php

namespace App\Http\Controllers;

use App\Libraries\Iyzico;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function checkout()
    {
        $iyzico = new Iyzico();
        $payment = $iyzico->setForm([
            'conversationID' => uniqid(),
            'price' => 100.0,
            'paidPrice' => 100.0,
            'basketID' => uniqid(),
        ])
            ->setBuyer([
                'id' => 123,
                'name' => 'Auth User Name',
                'surname' => 'Auth User Surname',
                'phone' => '+901234567891',
                'email' => 'user@email.com',
                'identity' => '55555555555',
                'address' => 'Auth User Address',
                'ip' => \request()->ip(),
                'city' => 'Auth User City',
                'country' => 'Auth User Country',
            ])
            // ->setShipping([
            //     'name' => 'User Address',
            //     'city' => 'User City',
            //     'country' => 'User Country',
            //     'address' => 'User Address',
            // ])
            ->setBilling([
                'name' => 'User Address',
                'city' => 'User City',
                'country' => 'User Country',
                'address' => 'User Address',
            ])
            ->setItems([
                [
                    'id' => 23,
                    'name' => 'Course Name',
                    'category' => 'Course Category',
                    'price' => 100.0,
                ],
            ])
            ->paymentForm();

        return view('payment_page', [
            'paymentContent' => $payment->getCheckoutFormContent(),
            'paymentStatus' => $payment->getStatus(),
        ]);
    }

    public function callback(Request $request)
    {
        $token = $request->token;
        $iyzico = new Iyzico();
        $response = $iyzico->callbackForm($token);

        return view('callback', [
            'paymentStatus' => $response->getPaymentStatus(),
        ]);
    }

}
