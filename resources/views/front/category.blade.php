@extends('layouts.master')
@section('content')

<h1>Pour les  : {{ ucfirst(App\Models\Category::frName($category->id)) }}</h1>
<div class="row">
    @if (empty($products))
        <h1>C'est vide</h1>
        <img src="https://i.giphy.com/media/3oriff4xQ7Oq2TIgTu/giphy.webp" alt="empty">
    @else
        <div class="row">
            <span class="right">{{ $products->total() }} résultats</span>
        </div>
        @foreach($products as $product)
        @if ($product->status !== 'unpublished')
        <div class="col s12 m8 l4">
            <div class="card">
                <div class="card-image">
                    <img src="{{ image($product->picture->link, 500, 600, 'crop-75-25') }}">
                    @if ($product->discounted && !Request::is('sales'))
                    <span class="badge red">en solde</span>   
                    @endif
                </div>
                <div class="card-content">
                    <p>{{ Str::limit($product->description, 40) }}</p>
                </div>
                <div class="card-action valign-wrapper cyan darken-2">
                        <a  class=" text-darken-1" href="{{url('product', $product->id)}}">{{$product->name}}</a>
                        <div class="right-align">
                            <span class="right-align euro">{{$product->price}}</span>
                        </div>
                </div>
            </div>
        </div>
        @endif   
        @endforeach
        <div class="row">
            <span class=>{{ $products->links('partials.paginate') }}</span>
        </div>
    @endif
    </div>
@endsection