@extends('layouts.layout')

@section('title') Product @endsection
@section('description') See more info about this item. @endsection
@section('keywords') shop, online, home, best, sellers @endsection

@section('content')
<div class="container mb-3">
    <div class="card mt-4">
        <img class="card-img-top img-fluid" src="{{ asset('assets/img/' . $product->image) }}" alt="">
        <div class="card-body">
            <h3 class="card-title">{{$product->name}}</h3>
            <h4>${{$product->price}}</h4>
            <p>{{$product->description}}</p>
            @if(Session::get('user'))
            <div class="d-flex">
                <a href="{{ route('product.edit', ['product' => $product->id]) }}" class="btn btn-secondary mr-3">Edit</a>
                <form method="POST" action="{{ route('product.destroy', ['product' => $product->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection