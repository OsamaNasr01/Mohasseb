@extends('layout.master')

@section('pagetitle', 'Products')

@section('content')
    <div style="padding-top: 1rem">
        <form action="{{ route('product.create') }}" method="get">
            @csrf
            <button  class="btn btn-primary" type="submit">Add new product</button>
        </form>
    </div>
    <div>
        <h1>
            List of products
        </h1>
    </div>
    @php
        $index = 0;
    @endphp
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Brand</th>
                <th scope="col">Price</th>
                <th scope="col">Inventry</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                @php
                    $index += 1;
                    $brand = $product-> brand;
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
                    <td><a href="{{ ROUTE('brand.show', $brand) }}">{{ $product -> brand -> name }}</a></td>
                    <td>{{$product -> prices -> s_price}}</th>
                    <td>{{$totalin - $totalout}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection