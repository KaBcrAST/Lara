@extends('layouts.panier')

@section()


@foreach($products as $product)
  <div class="card-group">
  <div class="card">
    <img class="card-img-top" src="{{$product->image}}" alt="Card image cap" style="width: 400px;">
    <div class="card-body">
      <h5 class="card-title">{{$product->title}}</h5>
      <div class="mb-1 text-muted">{{$product->cat}}</div>

      <p class="mb-0">{{$product->description}}</p>
      <br>
      <a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Ajouter au panier</a>

      <a href="{{ route('products.show', $product->moreinfo) }}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Voir plus</a>

    </div>
    <div class="card-footer">

    </div>
  </div>

  </div>
      @endforeach 

      @endsection

    