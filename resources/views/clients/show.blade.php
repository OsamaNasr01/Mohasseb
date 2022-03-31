@extends('layout.master')

@section('pagetitle', $client->name)

@section('content')
    <div>
        <h1>
            {{$client -> name}}
        </h1>
    </div>
    <div>
        <h3>
            Address: {{$client -> address}}
        </h3>
    </div>
    <div>
        <h3>
            Description: {{$client -> description}}
        </h3>
    </div>
    <div>
        <h3>
            Phone: 0{{$client -> phone}}
        </h3>
    </div>
    @php
        $index = 0;
        $total = 0;
        $sinvoices = $client -> sinvoice;
        $pinvoices = $client -> pinvoice;
        $receiptins = $client -> receiptin;
        $receiptouts = $client -> receiptout;
    @endphp
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Description</th>
                <th scope="col">Type</th>
                <th scope="col">Value</th>
                <th scope="col">date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sinvoices as $sinvoice)
                @php
                    $index += 1;
                    $total -= $sinvoice -> value;
                @endphp
                <tr>
                    <th scope="row">{{ $index }}</th>
                    <td><a href="{{ ROUTE('sinvoice.show', $sinvoice) }}">{{$sinvoice -> name}}</a></td>
                    <td>Sale</td>
                    <td>-{{$sinvoice -> value}}</th>
                    <td>{{$sinvoice->created_at-> diffForHumans()}}</td>
                </tr>
            @endforeach
            @foreach ($pinvoices as $pinvoice)
                @php
                    $index += 1;
                    $total += $pinvoice -> value;
                    $invoice = $pinvoice;
                @endphp
                <tr>
                    <th scope="row">{{ $index }}</th>
                    <td><a href="{{ ROUTE('invoice.show', $invoice) }}">{{$pinvoice -> name}}</a></td>
                    <td>Purchase</td>
                    <td>+{{$pinvoice -> value}}</th>
                    <td>{{$pinvoice->created_at-> diffForHumans()}}</td>
                </tr>
            @endforeach
            @foreach ($receiptins as $receiptin)
                @php
                    $index += 1;
                    $total += $receiptin -> value;
                @endphp
                <tr>
                    <th scope="row">{{ $index }}</th>
                    <td><a href="{{ ROUTE('receiptin.show', $receiptin) }}">{{$receiptin -> name}}</a></td>
                    <td>Income</td>
                    <td>+{{$receiptin -> value}}</th>
                    <td>{{$receiptin->created_at-> diffForHumans()}}</td>
                </tr>
            @endforeach
            @foreach ($receiptouts as $receiptout)
                @php
                    $index += 1;
                    $total -= $receiptout -> value;
                @endphp
                <tr>
                    <th scope="row">{{ $index }}</th>
                    <td><a href="{{ ROUTE('receiptout.show', $receiptout) }}">{{$receiptout -> name}}</a></td>
                    <td>Payment</td>
                    <td>-{{$receiptout -> value}}</th>
                    <td>{{$receiptout->created_at-> diffForHumans()}}</td>
                </tr>
            @endforeach
            <tr>
                <th scope="row">#</th>
                <th></th>
                <th></th>
                <th>Credit</th>
                <th>{{ $total }}</th>
            </tr>
        </tbody>
    </table>
@endsection