@extends('layouts.master')

@section('content')
<h1 class="center">Gérer les produits</h1>
    <header class="container left">
        <div class="col s12">
            <a class='btn btn-info btn-add' href="{{route('products.create')}}">
                <i class="material-icons left">add</i>
                Ajouter un nouveau produit !
            </a>
            @include('back.partials.flash')
        </div>
    </header>
    @if (empty($products))
    <h1>C'est vide</h1>
    <img src="https://i.giphy.com/media/3oriff4xQ7Oq2TIgTu/giphy.webp" alt="empty">
    @else
    <Section class="product-tab-ctrn">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Nom</th>
                <th scope="col">Tailles</th>
                <th scope="col">Référence</th>
                <th scope="col">Prix</th>
                <th scope="col">Categorie</th>
                <th scope="col">Status</th>
                <th scope="col">Détails</th>
                <th scope="col">Suppression</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr @if($product->discounted) class="red lighten-5" title="Article soldé"@endif>

                    {{-- Name --}}
                    <th scope="row">
                        <a href="{{route('products.edit',$product->id) }}">{{Str::upper($product->name)}}</a>
                    </th>

                    {{-- Sizes --}}
                    <td>
                        @forelse ($product->sizes as $size)
                            {{$size}}
                        @empty
                            Non disponible
                        @endforelse
                    </td>

                    {{-- Ref. --}}
                    <td><span>{{ $product->reference ?? "aucune ref"}}</span></td>

                    {{-- Price --}}
                    <td><span class="euro">{{ $product->price ?? "aucun genre"}}</span></td>

                    {{-- Category --}}
                    <td>{{ucfirst($product->category->name)}}</td>

                    {{-- Status --}}
                    <td>
                        @if($product->status == 'published')
                            <a class="waves-effect waves-light btn green" title="Publié">
                                <i class="material-icons status">check_circle_outline</i>
                            </a>
                        @else
                            <a class="waves-effect waves-light btn amber" title="Non publié">
                                <i class="material-icons status">unpublished</i>
                            </a>
                        @endif
                    </td>

                    {{-- Show --}}
                    <td >
                        <a title="Aperçu" class="black-text preview" href="{{route('products.show',$product->id)}}">
                            <i class="material-icons center">preview</i>
                        </a>
                    </td>

                    {{-- Delete --}}
                    <td>            
                        <form class="delete" method="POST" action="{{route('products.destroy', $product->id)}}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button class="btn waves-effect waves-light btn-small red darken-4" type="submit" name="action">
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
        <div class="row">
            <span class=>{{ $products->links('partials.paginate') }}</span>
        </div>
    </Section>
    @endif
@endsection 
