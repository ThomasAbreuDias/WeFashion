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
            <table>
                <tbody>
                    <tr>
                        <td>Nom :</td>
                        <td class="right-align">{{ ucfirst($product->name) }}</td>
                    </tr>
                    <tr>
                        <td>Prix :</td>
                        <td class="right-align euro">{{$product->price}}</td>
                    </tr>
                    <tr>
                        <td>Crée :</td>
                        <td class="right-align">{{$product->created_at}}</td>
                    </tr>
                    <tr>
                        <td>Modifié :</td>
                        <td class="right-align">{{$product->updated_at}}</td>
                    </tr>
                    <tr>
                        <td>Réf. :</td>
                        <td class="right-align">{{$product->reference}}</td>
                    </tr>
                    <tr>
                        <td>Publié :</td>
                        <td class="right-align">{{$product->status ? 'Oui' : 'Non' }}</td>
                    </tr>
                    <tr>
                        <td>Soldé :</td>
                        <td class="right-align">{{$product->discounted ? 'Oui' : 'Non' }}</td>
                    </tr>
                    <tr>
                        <td>Pour :</td>
                        <td class="right-align">{{ucfirst(App\Models\Category::frName($product->category_id))}}</td>
                    </tr>
                </tbody>
            </table>
            
            <div class="input-field">
                <select class="browser-default" @if( $sizes['id']!== 1 && !in_array(1, $sizes)) disabled @endif>
                @foreach ($sizes as $size => $has)
                    @if($loop->first)
                    <option value="" disabled selected>Tailles disponible</option>
                    @else    
                        @if($has)
                        <option value="{{$size}}">{{Str::upper($size)}}</option>
                        @endif
                    @endif
                @endforeach
                </select>
            </div>
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

