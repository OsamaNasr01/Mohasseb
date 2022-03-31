@php
    $subtotal = 0;
    $index = 0;
@endphp
@extends('layout.master')

@section('pagetitle', 'Create Invoice')

@section('content')
    <div>
        <h1>
            Create New Invoice
        </h1>
    </div>
    <div>
        <form action="{{ route('invoiceitem.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="product_id">product ID</label>
                <input class="form-control" type="text" name="product_id">
            </div>
            <div class="form-group">
                <label for="no">Number of products</label>
                <input class="form-control" type="text" name="no">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">
                    Add to invoice
                </button>
            </div>
        </form>
    </div>
    <div>
        <form action="{{ route('sinvoice.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="client_id">client ID</label>
                <input class="form-control" type="text" name="client_id">
            </div>
            <div class="form-group">
                <label for="project_name">Project Name</label>
                <input class="form-control" type="text" name="project_name">
            </div>
            @foreach ($items as $item)
            <div>
                @php
                    $total = ($item->product->prices->s_price) * ($item->no);
                    $subtotal += $total;
                    $index += 1; 
                @endphp
                <div>
                    <p>
                        {{ $index }} |  {{ $item->product->name }} | {{ $item->no }} | {{ $item->product->prices->s_price }} | {{ $total }}
                    </p>
                </div>
            </div>
            @endforeach
            <div class="form-group">
                <label for="subtotal">Total value of invoice</label>
                <input class="form-control"  type="text" name="subtotal" value="{{ $subtotal }}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">
                    Submit
                </button>
            </div>
        </form>
    </div>
@endsection