@extends('layouts.master')

@section('content')
<div class="row">
    <h1 class="center">Modifier la categorie : {{$category->id}}</h1>
</div>
    <form class="container" action="{{route('categories.update', $category->id)}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{method_field('PUT')}}
        <div class="row">
            <fieldset class="input-field col s12">
                <legend class="control-label">Saisissez le nom de la categorie</legend>
                <input type="text" name="name" value="{{$category->name}}">
                @if($errors->has('name')) <span class="error">{{$errors->first('name')}}</span>@endif
            </fieldset>
        </div>
        <div class="row form-group">
            <button type="submit">Modifier</button>
        </div>
    </form>
@endsection 