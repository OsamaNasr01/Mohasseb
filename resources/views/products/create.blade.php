@extends('layout.master')

@section('pagetitle', 'Products')

@section('content')
    <div>
        <h1>
            Create New Product
        </h1>
    </div>
    <div>
        <form action="{{ route('product.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input class="form-control" type="text" name="product_name">
            </div>
            <div class="form-group">
                <label for="brand_id">Brand ID</label>
                <input class="form-control" type="text" name="brand_id">
            </div>
            <div class="form-group">
                <label for="product_price">Price</label>
                <input class="form-control" type="text" name="product_price">
            </div>
            <div class="form-group">
                <label for="sale_price">Sale Price</label>
                <input class="form-control" type="text" name="sale_price">
            </div>
            <div style="padding-top: 1rem" class="form-group">
                <button class="btn btn-primary" type="submit">
                    Submit
                </button>
            </div>
        </form>
    </div>
@endsection