<div class="col-lg-4 col-md-6 mb-4">
    <div class="card h-100">
      <a href="#"><img class="card-img-top" src="{{ asset('assets/img/' . $product->image) }}" alt="{{ $product->name }}"></a>
      <div class="card-body">
        <h4 class="card-title">
          <a href="{{ route('product', ["product" => $product->id]) }}">{{ $product->name }}</a>
        </h4>
        <h5>${{ $product->price }}</h5>
        <p class="card-text">
          Categories:
          @foreach($product->categories as $category)
              {{$category->name}}@if(!$loop->index == count($product->categories) -1), @endif
          @endforeach
        </p>
        @if($description)
        <p class="card-text">{{ $product->description }}</p>
        @endif
      </div>
    </div>
  </div>