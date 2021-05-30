<nav class="green">
    <div class="nav-wrapper container">
      <a href="{{url('/')}}" class="waves-effect waves-teal btn-flat we-fashion-green green lighten-5"
      @if(isBack()) title="Retour côté public" @endif>
        {{config('app.name')}} 
      </a>
      <ul id="nav-mobile" class="right">
        {{-- Solde --}}
        @if (isset($categories) && !isBack())
          <li @if(Request::is('sales')) class="active" @endif>
              <a class="nav-item" href="{{url('sales')}}">soldes</a>
          </li>

          {{-- Categories --}}
          @forelse($categories as $id => $name)
              <li @if(Request::url() == url('category', $id)) class="active" @endif>
                <a class="nav-item" href="{{url('category', $id)}}">{{$name}}</a>
              </li>
          @empty 
          <li>Aucune categorie pour l'instant</li>
          @endforelse
        @endif
        @if (Auth::check())
          <li class="left"><a href="{{ route('products.index') }}">Produits</a></li> 
          <li class="left"><a href="{{ route('categories.index') }}">Categories</a></li> 
          {{-- Logout --}}
          <li>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
          </li>
        @endif
      </ul>
    </div>
  </nav>