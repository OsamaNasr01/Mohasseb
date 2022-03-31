@extends('layout.master')

@section('pagetitle', 'Add client')

@section('content')
    <div>
        <h1>
            Add New client
        </h1>
    </div>
    <div>
        <form action="{{ route('client.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="client_name">Client Name</label>
                <input class="form-control" type="text" name="client_name">
            </div>
            <div class="form-group">
                <label for="client_address">Client address</label>
                <input class="form-control" type="text" name="client_address">
            </div>
            <div class="form-group">
                <label for="client_description">Client description</label>
                <input class="form-control" type="text" name="client_description">
            </div>
            <div class="form-group">
                <label for="client_phone">Client phone</label>
                <input class="form-control" type="text" name="client_phone">
            </div>
            <div  style="padding-top: 1rem" class="form-group">
                <button class="btn btn-primary" type="submit">
                    Submit
                </button>
            </div>
        </form>
    </div>
@endsection