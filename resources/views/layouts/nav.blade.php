<div class="top-ribbon">
  <div class="container">
    <div class="d-flex justify-content-between py-2">
      
        <a class="text-dark" href="{{ route('contact') }}">Contacta con nosotros</a>
        <!--<a class="text-dark" href="#">Iniciar sesión</a>-->
      
    </div>
  </div>
</div><!-- /top-ribbon -->

<div class="container">

  <div class="d-flex bd-highlight">

    <div class="py-1 align-self-center">
      <a href="{{ route('home') }}">
      <img 
        src="{{ asset('images/logo_main.png') }}" 
        class="logo img-fluid" alt="Masas La Marta">
      </a>
    </div>

    <div class="py-1 flex-grow-1 align-self-center">

      <nav class="navbar navbar-expand-lg ">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ml-auto mx-auto">
            <li class="nav-item active">
              <a class="nav-link text-dark" href="{{ route('home') }}">
                Inicio <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="{{ route('about') }}">Quiénes somos</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Productos
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                @isset($categories)
                  @foreach($categories as $category)
                    <a class="dropdown-item" href="{{ route('category-catalog', $category->slug) }}">{{ $category->name }}</a>
                  @endforeach
                @endisset
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="{{ route('price-list') }}">Lista de precios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="{{ route('contact') }}">Contacto</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>

    <div class="py-1 align-self-center live-search">
      
      <search></search>

    </div>

  </div>



</div><!-- /container -->




  
  
 

