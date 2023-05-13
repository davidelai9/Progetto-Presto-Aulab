<div class="sidebar close">
  <div class="logo-details">
    <a href="{{route('homepage')}}"><i class='bx bxs-shopping-bags'></i></a>
    <span class="logo_name">Presto.it</span>
  </div>
  <ul class="nav-links">
    <li>
      <a href="{{route('homepage')}}">
        <i class='bx bxs-home-smile'></i>
        <span class="link_name">{{__('ui.HomePage')}}</span>
      </a>
      <ul class="sub-menu blank">
        <li><a class="link_name" href="{{route('homepage')}}">{{__('ui.HomePage')}}</a></li>
      </ul>
    </li>

    {{-- lINGUE --}}
    <li>
      <div class="icon-link">
        <a href="#">
          <i class='bx bx-world' ></i>
          <span class="link_name">{{__('ui.Lingue')}}</span>
        </a>
        <i class='bx bxs-chevron-down arrow' ></i>
      </div>
      <ul class="sub-menu">
        <li><a class="link_name" href="#">{{__('ui.Lingue')}}</a></li>
        <li><x-_locale lang="it" /></li>
        <li><x-_locale lang="es" /></li>
        <li><x-_locale lang="en" /></li>
        <li><x-_locale lang="fr" /></li>
        <li><x-_locale lang="ar" /></li>
      </ul>
    </li>
    {{-- FINE LINGUE --}}
    
    <li>
      <div class="icon-link">
        <a href="#">
          <i class='bx bx-collection' ></i>
          <span class="link_name">{{__('ui.Categorie')}}</span>
        </a>
        <i class='bx bxs-chevron-down arrow' ></i>
      </div>
      <ul class="sub-menu">
        <li><a class="link_name" href="#">{{__('ui.Categorie')}}</a></li>
        @foreach($categories as $category)
        <li><a class="dropdown-item" href="{{route('categoryShow', compact('category'))}}">{{__('category.' . strtolower($category->name))}}</a></li>
        @endforeach
      </ul>
    </li>
    <li>
      <div class="icon-link">
        <a href="#">
          <i class='bx bx-user'></i>
          <span class="link_name">{{__('ui.Profilo')}}</span>
        </a>
        <i class='bx bxs-chevron-down arrow' ></i>
      </div>
      <ul class="sub-menu">
        <li><a class="link_name" href="#">{{__('ui.Profilo')}}</a></li>
        @guest
        <li><a  href="{{route('login')}}">{{__('ui.Login')}}</a></li>
        <li><a href="{{route('register')}}">{{__('ui.Registrati')}}</a></li>
        @else
        <li><a href="{{route('products.create')}}">{{__('ui.InserisciAnnuncio')}}</a></li>
        @if (Auth::user()->is_revisor)
        <li>
          <a href="{{ route('revisor.index') }}">
              {{__('ui.AreaRevisore') }}
              @php
                  $count = App\Models\Product::toBeRevisionedCount();
                  $animate = $count > 0;
              @endphp
              <span class="ms-2 badge rounded-pill @if($animate) animate__animated animate__heartBeat animate__infinite @endif">
                  {{$count}}
                  <span class="visually-hidden">unread messages</span>
              </span>
          </a>
      </li>
        @else
        <li><a href="{{route('workWithUs')}}">{{__('ui.Lavora')}}
          @endif
          <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">{{__('ui.Logout')}}</a>
          <form id="form-logout" class="d-none" action="{{route('logout')}}" method="POST">@csrf</form>
          @endguest
        </ul>
      </li>
      <li>
        <a href="{{route('products.index')}}">
          <i class='bx bx-show'></i>
          <span class="link_name">{{__('ui.Tutti')}}</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{route('products.index')}}">{{__('ui.Tutti')}}</a></li>
        </ul>
      </li>
      <li>
        <a href="{{route('chiSiamo')}}">
          <i class="fa-solid  fs fa-people-group"></i>
          <span class="link_name">{{__('ui.Chi')}}</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{route('chiSiamo')}}">{{__('ui.Chi')}}</a></li>
        </ul>
      </li>
      <div class="profile-details">
        @guest
        @else
        <div class="name-job mx-auto">
          <div class="profile_name">{{Auth::user()->name}}</div>
        </div>
      </div>
      @endguest
    </ul>
  </div>
  
  
  