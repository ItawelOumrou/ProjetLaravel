<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    
    <title>Laravel</title>
</head>
<body>
   
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
   
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('etudiants')}}">Listes des etudiants</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link active" href="{{url('etudDip')}}" tabindex="-1" aria-disabled="true">Listes des nom es etudiants</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link active" href="{{url('diplomes')}}" tabindex="-1" aria-disabled="true">Listes des diplomes</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
      <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('D??connecter') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
</ul>
    </div>
  </div>
</nav>
@yield('content')
<script src="{{asset('js/app.js')}}"></script>

<!-- SweetAlert -->
<script src = " https://unpkg.com/sweetalert/dist/sweetalert.min.js " > </script> 
@if (session()->get('titre'))
      <script>

              swal({
                    title:'{{session('titre')}}',
                     icon:'{{session('icon')}}',
                    button:'OK',
                });
           
              
        
        </script>
@endif
<!-- end sweet alert -->

</body>
</html>