@php
    $subtotal = 0;
    $index = 0;
@endphp
@extends('layout.master')

@section('pagetitle', 'Create Receipt')

@section('content')
    <div>
        <h1>
            Create New Income receipt
        </h1>
    </div>
    <div>
        <form action="{{ route('receiptin.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="client_id">Client ID</label>
                <input class="form-control" type="text" name="client_id">
            </div>
            <div class="form-group">
                <label for="name">Details</label>
                <input class="form-control" type="text" name="name">
            </div>
            <div class="form-group">
                <label for="value">Value of the receipt</label>
                <input class="form-control" type="text" name="value">
            </div>
            <div class="form-group mt-3">
                <button class="btn btn-primary" type="submit">
                    Submit
                </button>
            </div>
        </form>
    </div>
@endsection