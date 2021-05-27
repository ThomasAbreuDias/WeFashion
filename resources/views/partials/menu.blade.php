<nav>
    <div class="nav-wrapper container">
      <a href="{{url('/')}}" class="waves-effect waves-teal btn-flat">WeFashion</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        @if (isset($sales))
        <li class="active">
        @else
        <li>
        @endif
            <a class="nav-item" href="{{url('sales')}}">soldes</a>
        </li>
        @if (isset($categories))
        @forelse($categories as $id => $name)
            @if ($id === 1)
            <li ><a class="nav-item" href="{{url('category', $id)}}">hommes</a></li>
            @else
            <li ><a class="nav-item" href="{{url('category', $id)}}">femmes</a></li>
            @endif
        @empty 
        <li>Aucune categorie pour l'instant</li>
        @endforelse
        @endif
      </ul>
    </div>
  </nav>