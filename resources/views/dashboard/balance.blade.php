@extends('layout.master')

@section('pagetitle', 'Balance')

    @section('content')
        <div>
            <h1>
                List of Transactions
            </h1>
        </div>
        @php
            // dd($receiptins);
            $index = 0;
            $total = 0;
        @endphp
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Description</th>
                    <th scope="col">Client</th>
                    <th scope="col">Date</th>
                    <th scope="col">Type</th>
                    <th scope="col">Value</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($receiptins as $receiptin)
                    @php
                        $index += 1;
                        $total += $receiptin -> value;
                        $client = $receiptin -> clients;
                    @endphp
                    <tr>
                        <th scope="row">{{ $index }}</th>
                        <td><a href="{{ route('receiptin.show', $receiptin) }}">{{ $receiptin ->  name }}</a></td>
                        <td><a href="{{ route('client.show', $client) }}">{{ $client -> name }}</a></td>
                        <td>{{ $receiptin -> created_at ->diffForHumans() }}</td>
                        <td>Income</th>
                        <td>+{{ $receiptin -> value }}</td>
                    </tr>
                @endforeach
                
                @foreach ($receiptouts as $receiptout)
                    @php
                        $index += 1;
                        $total -= $receiptout -> value;
                        $client = $receiptout -> clients;
                    @endphp
                    <tr>
                        <th scope="row">{{ $index }}</th>
                        <td><a href="{{ route('receiptout.show', $receiptout) }}">{{ $receiptout -> name }}</a></td>
                        <td><a href="{{ route('client.show', $client) }}">{{ $client -> name }}</a></td>
                        <td>{{ $receiptout -> created_at -> diffForHumans()}}</td>
                        <td>Payment</td>
                        <td>-{{ $receiptout -> value }}</td>
                    </tr>
                @endforeach
                
                <tr>
                    <th scope="row">#</th>
                    <th> </th>
                    <th>Balance</th>
                    <th></th>
                    <th>{{ $total }}</th>
                </tr>
            </tbody>
        </table>
@endsection