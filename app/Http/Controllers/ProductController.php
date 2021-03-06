<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago;

class ProductController extends Controller
{

    public $products = [
            [
                "id" => 1,
                "name" => "Samsung Galaxy S9",
                "price" => 15000,
                "img" => "samsung-galaxy-s9-xxl.jpg"
            ],
            [
                "id" => 2,
                "name" => "LG G6",
                "price" => 10000,
                "img" => "l6g6.jpg"
            ],
            [
                "id" => 3,
                "name" => "iPhone 8",
                "price" => 16000,
                "img" => "Screen Shot 2017-11-01 at 13.01.54.png"
            ],
            [
                "id" => 4,
                "name" => "Motorola G5",
                "price" => 9000,
                "img" => "motorola-moto-g5-plus-1.jpg"
            ],
            [
                "id" => 5,
                "name" => "Moto G4",
                "price" => 9000,
                "img" => "motorola-moto-g4-3.jpg"
            ],
            [
                "id" => 6,
                "name" => "Sony Xperia XZ2",
                "price" => 10000,
                "img" => "003.jpg"
            ]
        ];

    public function home(){
        return view('home')->with([
            "securityView"  => "home",
            "products" => $this->products
        ]);
    }

    public function producto($id){
        foreach($this->products as $product) {
            if ($id == $product["id"]) {

                MercadoPago\SDK::setAccessToken("APP_USR-2572771298846850-120119-a50dbddca35ac9b7e15118d47b111b5a-681067803");
                MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");

                // Crea un objeto de preferencia
                $preference = new MercadoPago\Preference();

                // Crea un ítem en la preferencia
                $item = new MercadoPago\Item();
                $item->id = 1234;
                $item->title = $product["name"];
                $item->description = "Dispositivo móvil de Tienda e-commerce";
                $item->picture_url =  env('APP_URL').'/img/'.$product["img"];
                $item->quantity = 1;
                $item->unit_price = $product["price"];
                $item->currency_id = "COP";

                $payer = new MercadoPago\Payer();
                $payer->name = "Lalo";
                $payer->surname = "Landa";
                $payer->email = "test_user_83958037@testuser.com";

                $phone = new \stdClass();
                $phone->area_code  = "52";
                $phone->number = "5549737300";
                $payer->phone = $phone;

                $address = new \stdClass();
                $address->zip_code = "03940";
                $address->street_name = "Insurgentes Sur";
                $address->street_number = 1602;
                $payer->address = $address;

                $payment_methods = new MercadoPago\PaymentMethod();

                $excluded_payment_methods = new \stdClass();
                $excluded_payment_methods->id = "amex";
                $payment_methods->excluded_payment_methods = [$excluded_payment_methods];

                $excluded_payment_types = new \stdClass();
                $excluded_payment_types->id = "atm";
                $payment_methods->excluded_payment_types = [$excluded_payment_types];

                $payment_methods->installments = 6;

                $preference->back_urls = [
                    "success" => env('APP_URL')."/exitoso",
                    "failure" => env('APP_URL')."/rechazado",
                    "pending" => env('APP_URL')."/pendiente"
                ];
                $preference->auto_return = "approved";

                $preference->notification_url = env('APP_URL')."/api/webhook";
                //$preference->notification_url = "https://webhook.site/6251352a-bb45-4b88-8683-ad8839d82790";

                $preference->external_reference = "l.mendoza@nelumbo.com.co";
                $preference->expire = false;
                $preference->items = [$item];
                $preference->payer = $payer;
                $preference->payment_methods = $payment_methods;
                $preference->save();

                return view('producto')->with([
                    "securityView"  => "item",
                    "product" => $product,
                    "preference" => $preference
                ]);
            }
        }

        return "404";
    }

    public function exitoso(Request $request){

        MercadoPago\SDK::setAccessToken("APP_USR-2572771298846850-120119-a50dbddca35ac9b7e15118d47b111b5a-681067803");
        MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");

        //MercadoPago\SDK::setAccessToken("TEST-1519688405604599-042700-7b3550df82391034d9af1c3011400a41-750042665");

        $payment =new MercadoPago\Payment();
        $payment = $payment->find_by_id($request->input("payment_id"));

        /*
        http://localhost:8000/success?
        collection_id=1236312857
        collection_status=approved
        payment_id=1236312857
        status=approved
        external_reference=l.mendoza@nelumbo.com.co
        payment_type=credit_card
        merchant_order_id=2606976287
        preference_id=750042665-53fc0114-a15e-45f6-8634-1a6628f3bba8
        site_id=MCO
        processing_mode=aggregator
        merchant_account_id=null
        */

        return view('exitoso')->with([
            "payment_method_id"  => $payment->payment_method_id,
            "external_reference" => $request->input("external_reference"),
            "payment_id" => $request->input("payment_id")
        ]);

    }


    public function rechazado(){
        return view('rechazado');
    }

    public function pendiente(){
        return view('pendiente');
    }


}
