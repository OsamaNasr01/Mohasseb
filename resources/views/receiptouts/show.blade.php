
@php
    // dd($receiptin);
    $client = $receiptout -> clients;
@endphp
@extends('layout.master')

@section('pagetitle', $receiptout -> name)

@section('content')
    <div>
        <h1>
            {{$receiptout -> name}}
        </h1>
    </div>
    <div>
        <h1>
            Receipt No ( {{$receiptout -> id}} )
        </h1>
    </div>
    <div>
        <h3>
            Client name: <a href="{{ route('client.show', $client) }}">{{$receiptout -> clients -> name}}</a>
        </h3>
    </div>
    <div>
        <h3>
            Receipt value = {{$receiptout -> value}} EGP
        </h3>
    </div>
@endsection