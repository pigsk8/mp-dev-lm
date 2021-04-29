<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WebhookController extends Controller
{
    public function webhook(Request $request){

        $jsonString = json_encode($request->all());
        Storage::put('mercadopago/'.uniqid().'txt', $jsonString);
        return "webhook";
    }
}
