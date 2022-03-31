
@php
    // dd($invoice -> name);
    $client = $invoice -> clients;
@endphp
@extends('layout.master')

@section('pagetitle', $invoice -> name)

@section('content')
    <div>
        <h1>
            {{$invoice -> name}} .
        </h1>
    </div>
    <div>
        <h3>
            Invoice no ( {{$invoice -> id}} ) sale.
        </h3>
    </div>
    <div>
        <h3>
            <a href="{{ route('client.show', $client) }}">{{$invoice -> clients -> name}}</a>
        </h3>
    </div>
    <div>
        <h3>
            {{$invoice -> created_at}}
        </h3>
    </div>
    @php
        $items = $invoice -> inventryout;
        $index =0;
    @endphp
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">No</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                @php
                    $total = ($item ->price) * ($item->no);
                    $index += 1;
                    $product =$item -> product;
                @endphp
                <tr>
                    <th scope="row">{{ $index }}</th>
                    <td><a href="{{ ROUTE('product.show', $product) }}">{{ $item->product->name }}</a></td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->no }}</td>
                    <td>{{ $total }}</td>
                </tr>
            @endforeach
            <tr>
                <th scope="row">#</th>
                <th></th>
                <th></th>
                <th>Invoice value</th>
                <th>{{ $invoice -> value }}</th>
            </tr>
        </tbody>
    </table>
@endsection