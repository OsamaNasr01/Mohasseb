@extends('layout.master')

@section('pagetitle', 'Payments')

@section('content')
    <div>
        <form action="{{ route('receiptout.create') }}" method="get">
            @csrf
            <button  class="btn btn-primary" type="submit">Add new payment Receipt</button>
        </form>
    </div>
    <div>
        <h1>
            List of payment receipts
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
            @foreach ($receiptouts as $receiptout)
                @php
                    $index += 1;
                    $client = $receiptout -> clients
                @endphp
                <tr>
                    <th scope="row">{{ $index }}</th>
                    <td><a href="{{ ROUTE('receiptout.show', $receiptout) }}">{{$receiptout -> name}}</a></td>
                    <td><a href="{{ ROUTE('client.show', $client) }}">{{ $client -> name }}</a></td>
                    <td>{{$receiptout -> created_at -> diffForHumans()}}</th>
                    <td>{{$receiptout -> value }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection