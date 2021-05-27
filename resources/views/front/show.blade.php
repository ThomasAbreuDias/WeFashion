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
                <label>Choisir sa taille</label>
                <div class="input-field">
                    <select class="browser-default">
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
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

