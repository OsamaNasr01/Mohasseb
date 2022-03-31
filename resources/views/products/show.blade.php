@php
    $brand = $product -> brand
@endphp
@extends('layout.master')

@section('pagetitle', $product -> name)

@section('content')
    <div>
        <h1>
            {{$product -> name}}
        </h1>
    </div>
    <div>
        <h3>
            Brand: <a href="{{ route('brand.show', $brand) }}">{{$product -> brand -> name}}</a>
        </h3>
    </div>
    <div>
        <h3>
            Current prices: {{$product -> prices -> p_price}} - {{$product -> prices -> s_price}}
        </h3>
    </div>
    @php
        $inventryins = $product -> inventryin;
        $totalin=0;
        foreach ($inventryins as $inventryin) {
            $totalin += $inventryin -> no;
        }
        $inventryouts = $product -> inventryout;
        $totalout=0;
        foreach ($inventryouts as $inventryout) {
            $totalout += $inventryout -> no;
        }
    @endphp
    <div>
        <h3>
            Inventry:  {{$totalin - $totalout}}
        </h3>
    </div>
    <div>
        <form action="" method="get"></form>
    </div>
    @php
        $index = 0;
    @endphp
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Client</th>
                <th scope="col">Price</th>
                <th scope="col">Each</th>
                <th scope="col">date</th>
                <th scope="col">type</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventryins as $inventryin)
                @php
                    $index += 1;
                    $client= $inventryin-> pinvoice-> clients;
                @endphp
                <tr>
                    <th scope="row">{{ $index }}</th>
                    <td><a href="{{ ROUTE('client.show', $client) }}">{{$inventryin ->pinvoice->clients->name}}</a></td>
                    <td>{{ $inventryin->price }}</td>
                    <td>+{{ $inventryin->no }}</th>
                    <td>{{$inventryin->created_at-> diffForHumans()}}</td>
                    <td>Purchase</td>
                </tr>
            @endforeach
            @foreach ($inventryouts as $inventryout)
                @php
                    $index += 1;
                    $client= $inventryout-> sinvoice-> clients;
                @endphp
                <tr>
                    <th scope="row">{{ $index }}</th>
                    <td><a href="{{ ROUTE('client.show', $client) }}">{{$inventryout ->sinvoice->clients->name}}</a></td>
                    <td>{{ $inventryout->price }}</td>
                    <td>-{{ $inventryout->no }}</th>
                    <td>{{$inventryout->created_at-> diffForHumans()}}</td>
                    <td>Sale</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection