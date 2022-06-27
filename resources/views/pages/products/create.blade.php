@extends('layouts.layout')

@section('title') Add a product @endsection
@section('description') Add a product. @endsection
@section('keywords') shop, online, home, best, sellers @endsection

@section('content')
<div class="container mt-4 min-vh-100">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif  
    <form action="{{route('product.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" />
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" />
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="mb-3 row">
            @foreach($categories as $c)
            <div class="col-md-3">
                <input type="checkbox" id="cat-{{$c->id}}" name="categories[]" value="{{$c->id}}" />
                <label for="cat-{{$c->id}}">{{$c->name}}</label>
            </div>
            @endforeach
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
</div>
@endsection