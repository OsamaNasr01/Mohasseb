@extends('layout.master')

@section('pagetitle', 'Brands')

    @section('content')
        <div>
            <h1>
                List of Brands
            </h1>
        </div>
        <div style="padding-top: 1rem">
            <form action="{{ route('brand.create') }}" method="get">
                @csrf
                <button class="btn btn-primary" type="submit">Add new brand</button>
            </form>
        </div>
        @php
            $index = 0;
        @endphp
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Brand name</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($brands as $brand)
                    @php
                        $index += 1;
                    @endphp
                    <tr>
                        <th scope="row">{{ $index }}</th>
                        <td><a href="{{ ROUTE('brand.show', $brand) }}">{{$brand -> name}}</a></td>
                        <td>{{$brand -> description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection