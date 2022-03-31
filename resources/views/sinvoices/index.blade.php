@extends('layout.master')

@section('pagetitle', 'Sale Invoices')

@section('content')
    <div style="padding: 1rem" >
        <form action="{{ route('sinvoice.create') }}" method="get">
            @csrf
            <button  class="btn btn-primary" type="submit">Add new SALE invoice</button>
        </form>
    </div>
    <div>
        <h1>
            List of Sale Invoices 
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
            @foreach ($invoices as $invoice)
                @php
                    $sinvoice = $invoice;
                    $index += 1;
                    $client = $invoice -> clients
                @endphp
                <tr>
                    <th scope="row">{{ $index }}</th>
                    <td><a href="{{ ROUTE('sinvoice.show', $invoice) }}">{{$invoice -> name}}</a></td>
                    <td><a href="{{ ROUTE('client.show', $client) }}">{{ $client -> name }}</a></td>
                    <td>{{$invoice -> created_at -> diffForHumans()}}</th>
                    <td>{{$invoice -> value }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection