<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WebhookController extends Controller
{
    public function webhook(Request $request){

        $jsonString = json_encode($request->all());
        try{
            Storage::put('mercadopago/'.uniqid().'.txt', $jsonString);
            $fp = fopen(__DIR__."/webhhok.txt", "w");
            fputs($fp, $jsonString);
            fclose($fp);
        }catch(\Exception $e){
            return $e->getMessage();
        }
        return "webhook";
    }
}
