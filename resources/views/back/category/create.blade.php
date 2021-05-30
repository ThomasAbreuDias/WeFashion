@extends('layouts.master')

@section('content')
<div class="row">
    <h1 class="center">Ajouter une categorie : </h1>
</div>
    <form class="container" action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <fieldset class="input-field col s12">
                <legend class="control-label">Saisissez le nom de la categorie</legend>
                <input type="text" name="name" value="{{old('name')}}">
                @if($errors->has('name')) <span class="error">{{$errors->first('name')}}</span>@endif
            </fieldset>
        </div>
        <div class="row form-group">
            <button  class="waves-effect waves-light btn-small" type="submit">Ajouter</button>
        </div>
    </form>
@endsection 