<nav>
    <div class="nav-wrapper container">
      <a href="{{url('/')}}" class="waves-effect waves-teal btn-flat">{{config('app.name')}}</a>
      <ul id="nav-mobile" class="right">
        <li @if(Request::is('sales')) class="active" @endif>
            <a class="nav-item" href="{{url('sales')}}">soldes</a>
        </li>
        @if (isset($categories))
        @forelse($categories as $id => $name)
            @if ($id === 1)
            <li @if(Request::url() == url('category', $id)) class="active" @endif>
              <a class="nav-item" href="{{url('category', $id)}}">hommes</a>
            </li>
            @else
            <li @if(Request::url() == url('category', $id)) class="active" @endif>
              <a class="nav-item" href="{{url('category', $id)}}">femmes</a>
            </li>
            @endif
        @empty 
        <li>Aucune categorie pour l'instant</li>
        @endforelse
        @endif
      </ul>
    </div>
  </nav>