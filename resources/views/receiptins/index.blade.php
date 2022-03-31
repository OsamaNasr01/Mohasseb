@extends('layout.master')

@section('pagetitle', 'Income')

@section('content')
    <div>
        <form action="{{ route('receiptin.create') }}" method="get">
            @csrf
            <button  class="btn btn-primary" type="submit">Add new Receipt</button>
        </form>
    </div>
    <div>
        <h1>
            List of income receipts
        </h1>
    </div>
    @php
        $index = 0;
    @endphp
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Description</th>
                <th scope="col">Client</th>
                <th scope="col">Date</th>
                <th scope="col">Value</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($receiptins as $receiptin)
                @php
                    $index += 1;
                    $client = $receiptin -> clients
                @endphp
                <tr>
                    <th scope="row">{{ $index }}</th>
                    <td><a href="{{ ROUTE('receiptin.show', $receiptin) }}">{{$receiptin -> name}}</a></td>
                    <td><a href="{{ ROUTE('client.show', $client) }}">{{ $client -> name }}</a></td>
                    <td>{{$receiptin -> created_at -> diffForHumans()}}</th>
                    <td>{{$receiptin -> value }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection