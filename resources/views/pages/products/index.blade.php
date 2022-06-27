@extends('layouts.layout')

@section('title') Products @endsection
@section('description') Browse all of our products. @endsection
@section('keywords') shop, online, products @endsection

@section('content')
  <div class="container mt-4 min-vh-100">

    <div class="d-flex justify-content-between align-items-center">
      <h1>Products</h1>
      @if(Session::get('user'))
      <a class="btn btn-primary" href="{{route('product.create')}}">Add a product</a>
      @endif
    </div>
    <hr />

    <div class="row">

      <div class="col-lg-3">
        
        <form action="" method="GET">

          <input type="text" class="form-control mb-3" placeholder="Search" name="search" value="{{request()->search ?? ''}}" />

          <select class="form-control mb-3" id="sort" name="sort">
            <option value="">Choose...</option>
            <option value="asc" @if(request()->sort && request()->sort == 'asc') selected @endif>Price: Low to High</option>
            <option value="desc" @if(request()->sort && request()->sort == 'desc') selected @endif>Price: High to Low</option>
          </select>

          <ul class="list-group mb-3">
            @foreach($categories as $category)
            <li class="list-group-item">
              <input type="checkbox" 
                      name="categories[]" 
                      id="category{{ $category->id }}" 
                      value="{{ $category->id }}"
                      @if(request()->categories && in_array($category->id, request()->categories)) checked @endif/> {{ $category->name }}
            </li>
            @endforeach
          </ul>

          <button class="btn btn-secondary w-100">Submit</button>
        </form>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div class="row">
          @forelse($products as $product)
            @include('partials.product', ["description" => false])
          @empty 
          <h2>No products.</h2>
          @endforelse
        </div>

        {{$products->withQueryString()->links('pagination::bootstrap-4')}}
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

    
    <!-- /.row -->

  </div>
@endsection