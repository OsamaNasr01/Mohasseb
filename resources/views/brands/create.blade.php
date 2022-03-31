@extends('layout.master')

@section('pagetitle', 'Products')

@section('content')
    <div style="padding-top: 2rem">
        <h1>
            Create New Brand
        </h1>
    </div>
    <div>
        <form action="{{ route('brand.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="brand_name">Brand Name</label>
                <input class="form-control" type="text" name="brand_name">
            </div>
            <div class="form-group">
                <label for="Brand_description">Brand description</label>
                <input class="form-control" type="text" name="brand_description">
            </div>
            <div style="padding-top: 2rem">
                <button class="btn btn-primary" type="submit">
                    Submit
                </button>
            </div>
        </form>
    </div>
@endsection