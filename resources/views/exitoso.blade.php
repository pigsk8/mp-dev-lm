@extends('layout')

@section('content')

<div>
    <h2>Exitoso</h2>
    <h3>Metodo de Pago</h3>
    <p>{{$payment_method_id}}</p>
    <h3>Referencia Externa</h3>
    <p>{{$external_reference}}</p>
    <h3>Pago</h3>
    <p>{{$payment_id}}</p>
</div>

@endsection
