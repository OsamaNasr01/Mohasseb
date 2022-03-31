@extends('layout.master')

@section('pagetitle', 'Clients')

    @section('content')
        <div style="padding-top: 1rem">
            <h1>
                List of Clients
            </h1>
        </div>
        <div style="padding-top: 1rem">
            <form action="{{ route('client.create') }}" method="get">
                @csrf
                <button  class="btn btn-primary" type="submit">Add new client</button>
            </form>
        </div>
        @php
            $index = 0;
        @endphp
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Client name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Credit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    @php
                        $index += 1;
                        $total = 0;
                        $sinvoices = $client -> sinvoice;
                        $pinvoices = $client -> pinvoice;
                        $receiptins = $client -> receiptin;
                        $receiptouts = $client -> receiptout;
                    @endphp
                    @foreach ($sinvoices as $sinvoice)
                        @php
                            $total -= $sinvoice -> value;
                        @endphp
                    @endforeach
                    @foreach ($pinvoices as $pinvoice)
                        @php
                            $total += $pinvoice -> value;
                        @endphp
                    @endforeach
                    @foreach ($receiptouts as $receiptout)
                        @php
                            $total -= $receiptout -> value;
                        @endphp
                    @endforeach
                    @foreach ($receiptins as $receiptin)
                        @php
                            $total += $receiptin -> value;
                        @endphp
                    @endforeach
                    <tr>
                        <th scope="row">{{ $index }}</th>
                        <td><a href="{{ ROUTE('client.show', $client) }}">{{$client -> name}}</a></td>
                        <td>0{{$client -> phone }}</td>
                        <td>{{$total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection