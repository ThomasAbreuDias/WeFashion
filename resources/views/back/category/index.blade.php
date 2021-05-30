@extends('layouts.master')

@section('content')
<h1>Gerer les catégories</h1>
    <header class="container left">
        <div class="col s12">
            <a class='btn btn-info btn-add' href="{{route('categories.create')}}">
                <i class="material-icons left">add</i>
                Ajouter une nouvelle categorie !
            </a>
            @include('back.partials.flash')
        </div>
    </header>
    @if (empty($categories))
    <h1>C'est vide</h1>
    <img src="https://i.giphy.com/media/3oriff4xQ7Oq2TIgTu/giphy.webp" alt="empty">
    @else
    <Section class="product-tab-ctrn">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Traduction</th>
                    <th scope="col">Suppression</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $id => $category)
                    <tr>
                        <td><a href="{{route('categories.edit',$id) }}">{{ ucfirst($category) }}</a></td>
                        <td>            
                            <form class="delete" method="POST" action="{{route('categories.destroy', $id)}}">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button class="btn waves-effect waves-light red darken-4" type="submit" name="action">
                                <label class="white-text">Suppression</label>
                                <i class="material-icons left">delete</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                <tr>
                    <th>Désolé pour l'instant aucun produit n'est publié sur le site</th>
                </tr>
                @endforelse
            </tbody>
        </table>
    </Section>
    @endif
@endsection 
