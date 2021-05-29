@extends('layouts.master')

@section('content')
<article class="container">
    @dump($product)
    @if(!empty($product))
    <div class="row">
        <div class="col s9">
            @if(!empty($product->picture))
                <a href="#" class="thumbnail">
                    <img src="{{ image($product->picture->link, 500, 600, 'crop-75-25') }}" alt="{{$product->picture->title}}">
                </a>
            @endif   
        </div>
        <div class="col s3">
            <h1>{{ ucfirst($product->name) }}</h1>
            <span class="right-align euro">{{$product->price}}</span>
            <form action="#" method="POST">
                <label>Tailles disponibles</label>
                <div class="input-field">
                    <select class="browser-default" @if( $sizes['id']!== 1 && !in_array(1, $sizes)) disabled @endif>
                    @foreach ($sizes as $size => $has)
                        @if($loop->first)
                        <option value="" disabled selected>Choissez une taille</option>
                        @else    
                            @if($has)
                            <option value="{{$size}}">{{Str::upper($size)}}</option>
                            @endif
                        @endif
                    @endforeach
                    </select>
                </div>
            </form>
        </div>
    @else 
        <h1>Désolé article non disponible</h1>
    @endif 
    </div>
    <div class="row">
        <h2>Description :</h2>
        {{$product->description}} 
    </div>
   
</article>

</ul>
@endsection 

