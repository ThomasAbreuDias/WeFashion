<nav>
    <div class="nav-wrapper container">
      <a href="{{url('/')}}" class="waves-effect waves-teal btn-flat we-fashion-green">{{config('app.name')}}</a>
      <ul id="nav-mobile" class="right">
        @if (isset($categories))
        <li @if(Request::is('sales')) class="active" @endif>
            <a class="nav-item" href="{{url('sales')}}">soldes</a>
        </li>
        @forelse($categories as $id => $name)
            <li @if(Request::url() == url('category', $id)) class="active" @endif>
              <a class="nav-item" href="{{url('category', $id)}}">{{App\Models\Category::frName($id)}}</a>
            </li>
        @empty 
        <li>Aucune categorie pour l'instant</li>
        @endforelse
        @endif
        @if (Auth::check())
          <li><a href="{{ route('products.index') }}">Dashboard</a></li> 
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