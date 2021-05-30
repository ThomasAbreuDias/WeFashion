@extends('layouts.master')

@section('content')
<div class="row">
    <h1 class="center">Modifier le produit : {{$product->id}}</h1>
</div>
    <form class="container" action="{{route('products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{method_field('PUT')}}
        <div class="row">
            {{-- Name --}}
            <fieldset class="input-field col s12">
                <legend class="control-label">Titre</legend>
                <input type="text" name="name" value="{{$product->name}}">
            </fieldset>
        </div>
        <div class="row">
            {{-- Desc --}}
            <fieldset class="input-field col s12">
                <legend class="control-label">Description</legend>
                <textarea class="materialize-textarea" name="description" id="description" cols="30" rows="10">{{$product->description}}</textarea>
            </fieldset>
        </div>
        <div class="row">
            {{-- Price --}}
            <div class="col s6">
                <fieldset class="input-field">
                    <legend class="control-label">Prix produit</legend>
                    <input type="text" name="price" value="{{$product->price}}">
                </fieldset>
            </div>

            {{-- Ref --}}
            <div class="col s6">
                <fieldset class="input-field">
                    <legend class="control-label">Réfèrence produit</legend>
                    <input type="text" name="reference" value="{{$product->reference}}">
                    @if($errors->has('reference')) <span class="error">{{$errors->first('reference')}}</span>@endif
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col s5">
                {{-- Category --}}
                <fieldset class="input-field">
                    <legend class="control-label">Categories</legend>
                    <input type="hidden" name="category_id" value="{{$product->category->id}}">
                    <select class="browser-default" id="category_id" name="category_id">
                        <option value="0" {{is_null($categories)? 'selected' : ''}}>Pas de categories</option>
                        @forelse ($categories as $id => $category)
                            <option {{ ( !is_null($product->category) and $product->category->id == $id ) ? 'selected' : '' }} id="{{$id}}" value="{{$id}}">{{ucfirst($category)}}</option>
                        @empty
                            Vous devez ajouter des categories pour continuer
                        @endforelse
                    </select>
                </fieldset>
            </div>
            <div class="col s4">
                {{-- Sizes --}}
                <legend class="control-label">Tailles</legend>
                <input type="hidden" name="sizes_id" value="{{$product->getSizesIdsAttribute()}}">
                <div class="row">
                    @forelse ($sizes as $size => $has)
                        @if($size !== 'id')
                        <div class="col s4">
                            <fieldset class="input-field">
                                <label> 
                                    <input type="checkbox" class="filled-in" id="{{$size}}" value="{{$size}}" name="sizes[]"
                                    @if( $has )
                                    checked
                                    @endif>
                                    <span for="{{$size}}">{{Str::upper($size)}}</span>
                                </label>
                            </fieldset>
                        </div>
                        @endif
                    @empty
                    Vous devez ajouter des tailles pour continuer
                    @endforelse
                </div>
            </div>
            <div class="col3">
                <div class="row">
                    {{-- Status --}}
                    <legend class="control-label">Status</legend>
                    <label for="published">
                        <input class="with-gap" type="radio" @if($product->status =='published') checked @endif name="status" value="published" id="published" checked>
                        <span>Publié</span>
                    </label>
                    
                    <label for="unpublished">
                        <input type="radio" @if($product->status =='unpublished') checked @endif name="status" value="unpublished" id="unpublished">
                        <span>Non publié</span>
                    </label>
                    <div class="row">
                        {{-- Solded --}}
                        <legend class="control-label">Réduction</legend>
                        <label for="discounted">
                            <input type="checkbox" class="filled-in"  @if($product->discounted) checked @endif  value="1" name="discounted" id="discounted">
                            <span>Soldé</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            {{-- Picture --}}
            <legend class="control-label">Image produit</legend>
            <input class="file" type="file" name="picture" >
            <fieldset class="input-field col s12">
                @if($errors->has('picture')) <span class="error bg-warning text-warning">{{$errors->first('picture')}}</span> @endif
                @if ($product->picture)
                <div class="form-group">
                    <h2>Image associè</h2>
                    <label for="genre">Titre image :</label>
                    <input type="text" name="title_img" id="title_img" value="{{$product->picture->title}}">
                </div>
                <div class="form-group">
                    <img src="{{url('images', $product->picture->link)}}" alt="couverture" width="300">
                </div>
                @endif
            </fieldset>
        </div>
        <div class="row form-group">
            <button type="submit">Modifier</button>
        </div>
    </form>
@endsection 