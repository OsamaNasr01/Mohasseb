@extends('layout.master')

@section('pagetitle', $brand->name)

@section('content')
    <div>
        <h1>
            {{$brand -> name}}
        </h1>
    </div>
    <div>
        <h3>
            description : {{$brand -> description}}
        </h3>
    </div>
    @php
        $index = 0;
        $products = $brand -> products
        // $index = 0;
    @endphp
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Inventry</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                @php
                    $index += 1;
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
                <tr>
                    <th scope="row">{{ $index }}</th>
                    <td><a href="{{ ROUTE('product.show', $product) }}">{{$product -> name}}</a></td>
                    <td>{{$product -> prices -> s_price}}</th>
                    <td>{{$totalin - $totalout}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection