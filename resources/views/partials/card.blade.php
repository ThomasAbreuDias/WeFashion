<div class="card">
    <div class="card-image">
        <img src="{{ image($product->picture->link, 500, 600, 'crop-75-25') }}">
    </div>
    <div class="card-action valign-wrapper">
        <a  class="green-text" href="{{url('product', $product->id)}}">{{$product->name}}</a>
        <span class="right-align euro price">{{$product->price}}</span>
        @if ($product->discounted && !Request::is('sales'))
        <span class="badge">en solde</span>   
        @endif
    </div>
</div>