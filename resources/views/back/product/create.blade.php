@extends('layouts.master')

@section('content')
<div class="row">
    <h1 class="center">Ajouter un produit : </h1>
</div>
    <form class="container" action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <fieldset class="input-field col s12">
                <legend class="control-label">Saisissez le nom produit</legend>
                <input type="text" name="name" value="{{old('name')}}">
                @if($errors->has('name')) <span class="error">{{$errors->first('name')}}</span>@endif
            </fieldset>
        </div>
        <div class="row">
            <fieldset class="input-field col s12">
                <legend class="control-label">Saisissez la description produit</legend>
                <textarea class="materialize-textarea" name="description" id="description" cols="30" rows="10">{{old('description')}}</textarea>
                @if($errors->has('description')) <span class="error">{{$errors->first('description')}}</span>@endif
            </fieldset>
        </div>
        <div class="row">
            <fieldset class="input-field col s12">
                <legend class="control-label">Saisissez le prix produit</legend>
                <input type="text" name="price" value="{{old('price')}}">
                @if($errors->has('price')) <span class="error">{{$errors->first('price')}}</span>@endif
            </fieldset>
        </div>
        <div class="row">
            <fieldset class="input-field col s12">
                <legend class="control-label">Saisissez la réfèrence produit</legend>
                <input type="text" name="reference" value="{{old('reference')}}">
                @if($errors->has('reference')) <span class="error">{{$errors->first('reference')}}</span>@endif

            </fieldset>
        </div>
        <div class="row">
            <fieldset class="input-field col s5">
                <legend class="control-label">Choisir la catégorie produit </legend>
                <select class="browser-default" id="category_id" name="category_id">
                    <option value="" {{is_null($categories)? 'selected' : ''}}>Pas de categories</option>
                    @forelse ($categories as $id => $category)
                        <option {{ !is_null(old('category_id')) ? 'selected' : '' }} id="{{$id}}" value="{{$id}}">{{ucfirst( App\Models\Category::frName($id) )}}</option>
                    @empty
                        Vous devez ajouter des categories pour continuer
                    @endforelse
                </select>
            </fieldset>
            <div class="col s7">
                <legend class="control-label">Choisir les tailles disponnibles</legend>
                @forelse ($sizes as $size)
                <fieldset class="input-field col s2">
                    <label> 
                        <input 
                        type="checkbox" 
                        class="filled-in" 
                        id="{{$size}}" 
                        value="{{$size}}" 
                        name="sizes[]"
                        {{ !is_null(old('category_id')) ? 'checked' : '' }}>
                        <span for="{{$size}}">{{Str::upper($size)}}</span>
                    </label>
                </fieldset>
                @empty
                Vous devez ajouter des tailles pour continuer
                @endforelse
            </div>
        </div>
        <div class="row">
                <legend class="control-label">Status</legend>
                <label for="published">
                    <input class="with-gap" type="radio" @if(old('status')=='published') checked @endif name="status" value="published" id="published" checked>
                    <span>Publié</span>
                </label>
                
                <label for="unpublished">
                    <input type="radio" @if(old('status')=='published') checked @endif name="status" value="unpublished" id="unpublished">
                    <span>Non publié</span>
                </label>
        </div>
        <div class="row">
                <legend class="control-label">Réduction</legend>
                <label for="discounted">
                    <input type="checkbox" class="filled-in"  @if(old('discounted') !== null ) checked @endif  value="1" name="discounted" id="discounted">
                    <span>Soldé</span>
                </label>
        </div>
        <div class="row">
            <fieldset class="input-field col s6">
                <legend class="control-label">Saisissez le titre de l'image</legend>
                <input type="text" name="title_img" id="title_img" value="{{old('title_img')}}">
            </fieldset>

            <fieldset class="input-field col s6">
                <legend class="control-label">Image produit</legend>
                <input class="file" type="file" name="picture" >
            </fieldset>
        </div>
        <div class="row form-group">
            <button  class="waves-effect waves-light btn-small" type="submit">Ajouter</button>
        </div>
    </form>
@endsection 