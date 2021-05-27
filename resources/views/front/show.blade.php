@extends('layouts.master')

@section('content')
<article class="container">
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
            <form action="#" method="POST">
                <label>Votres taille</label>
                <div class="input-field">
                    <select>
                    @foreach ($sizes as $size => $has)
                        @if($loop->first && $has)
                        <option value=""disabled selected>Votre taille</option>
                        @else
                        <option value="{{$size}}">{{$size}}</option>
                        @endif
                    @endforeach
                    </select>
                </div>
                  <button type="submit">Acheter</button>
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

