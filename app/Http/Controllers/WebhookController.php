<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Mail\sendMail;
use Illuminate\Support\Facades\Mail;
class WebhookController extends Controller
{
    public function webhook(Request $request){

        $jsonString = json_encode($request->all());
        Storage::put('mercadopago/'.uniqid().'.txt', $jsonString);

        Mail::to("test@mailmp.com")->send(new sendMail($jsonString));

        return "webhook";
    }
}
