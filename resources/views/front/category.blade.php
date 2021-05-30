@extends('layouts.master')
@section('content')

<h1>{{ ucfirst($category->name).'s' }}</h1>
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
            @include('partials.card')
        </div>
        @endif   
        @endforeach
        <div class="row">
            <span class=>{{ $products->links('partials.paginate') }}</span>
        </div>
    @endif
    </div>
@endsection