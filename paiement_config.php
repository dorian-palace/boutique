<?php

require 'vendor/autoload.php';
header('Content-Type: application/json');

// \Stripe\Stripe::setApiKey('sk_test_51KbQZXKCaaQvBYoE64c3uJwz1hh9axSaE640BRcrnQ7p3QrNq4I9qlnpHDINxp0LT3M9azdkwqHWBmRg9IWT1b2i00elTueF8T');



// $session = Stripe\checkout\Session::create([])

$stripe  =  new Stripe\StripeClient ("pk_test_51KbQZXKCaaQvBYoEZ6Kwqy5WYE3nZfvliBpNW2IgErmW9TYxUxwV7K2j14KZWookP4L58l6hqQwvt3bl6HH9xp1R00OFAYT8AD");

$session = $stripe->checkout->session->create([

  "succes_url" => "http://localhost/boutique/succes.html",
  "cancel_url" => "http://localhost/boutique/cancel.html",
  "payment_method_types" => ['card'],
  "mode" => 'payment',
  "line_items" => [

    [
        "price_data" => [

          "currency" => "eur",
          "product_data" => [

            "name" => "article 1",
            "description" => "articlie1"
          ],
          "unit_amount" => 200
        ],

        "quantity" => 2
      ]
  ]
  ]);

  echo json_encode($session);