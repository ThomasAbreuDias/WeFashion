@extends('layouts.master')

@section('content')
<div class="row">
    <span id="how-many">{{count($products)}} produit sont disponible</span>
</div>
<div class="row">
    @forelse($products as $product)
    <span>
        {{-- {{ dump(asset('images'.$product->picture->link)) }} --}}
    </span>
    @if ($product->status !== 'unpublished')
    <div class="col s12 m6 l3">
        <div class="card">
            <div class="card-image">
                <img src="{{ image($product->picture->link, 511, 639) }}">
            </div>
            <div class="card-content">
                <p>{{ Str::limit($product->description, 40) }}</p>
            </div>
            <div class="card-action valign-wrapper cyan darken-2">
                    <a  class=" text-darken-1" href="{{url('product', $product->id)}}">{{$product->name}}</a>
                    <span class="right-align euro">{{$product->price}}</span>
            </div>
        </div>
    </div>
    @endif   
@empty
<h1>C'est vide</h1>
<img src="https://i.giphy.com/media/3oriff4xQ7Oq2TIgTu/giphy.webp" alt="empty">
@endforelse
</div>
    @endsection 
