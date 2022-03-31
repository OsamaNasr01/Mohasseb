@php
    $subtotal = 0;
    $index = 0;
@endphp
@extends('layout.master')

@section('pagetitle', 'Create payment Receipt')

@section('content')
    <div>
        <h1>
            Create New payment receipt
        </h1>
    </div>
    <div>
        <form action="{{ route('receiptout.store') }}" method="post">
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
                <label for="value" >Value of the receipt</label>
                <input class="form-control" type="text" name="value">
            </div>
            <div style="padding-top: 1rem" class="form-group">
                <button class="btn btn-primary" type="submit">
                    Submit
                </button>
            </div>
        </form>
    </div>
@endsection