
@php
    // dd($receiptin);
    $client = $receiptin -> clients;
@endphp
@extends('layout.master')

@section('pagetitle', $receiptin -> name)

@section('content')
    <div>
        <h1>
            {{$receiptin -> name}}
        </h1>
    </div>
    <div>
        <h1>
            Receipt No ( {{$receiptin -> id}} )
        </h1>
    </div>
    <div>
        <h3>
            Client name: <a href="{{ route('client.show', $client) }}">{{$receiptin -> clients -> name}}</a>
        </h3>
    </div>
    <div>
        <h3>
            Receipt value = {{$receiptin -> value}} EGP
        </h3>
    </div>
@endsection