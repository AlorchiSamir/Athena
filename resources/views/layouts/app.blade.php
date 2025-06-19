<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/athena.js') }}" defer></script>
    <script src="{{ asset('js/plugins/jcrop.min.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/athena.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/jcrop.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
            <div class='row menu'>
                <div class='col-md-2'>
                    <a class="navbar-brand" href="{{ url('/') }}">Clairesprit</a>            
                </div>                
                <div class="collapse navbar-collapse col-md-10" id="navbarSupportedContent"> 
                    <ul class="navbar-nav">   
                        <li class="nav-item dropdown">                           
                                <a id="navbarDropdown2" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Catégories</a>
                            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown2">
                                @foreach(App\Models\Book\Category::getAll() as $cat)
                                    <a class="dropdown-item" href="{{ url('category/'.$cat->id.'/'.$cat->slug) }}">{{ $cat->name }}</a>
                                @endforeach                 
                            </div>
                        </li>
                    </ul>     
                    <div class='search-zone'>
                        <input type='text' class='search' data-url="{{ url('search') }}" placeholder="Votre recherche">                        
                    </div>              
                    <ul class="navbar-nav ml-auto">                       
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Se connecter</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">S'inscrire</a>
                                </li>
                            @endif
                        @else
                             
                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img class='avatar' src="{{  url('images/avatar/crop/'.Auth::user()->getAvatar()) }}" />
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('settings') }}">Paramètres</a>
                                    <a class="dropdown-item" href="{{ url('/book/interaction/interest') }}">Favoris</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Déconnexion
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
            </div>
        </nav>

        <main>
            @include('layouts.messages')
            @yield('content')
            <div id="button-modal">Proposer un livre</div>
        </main>
        <hr>
        <footer class='main-footer'>
            <span>{{ date('Y') }} Athena</span>
        </footer>
        @include('requests.modal')
    </div>
    <script>
  
    $(function(){
  
        $('#button-modal').click(function() {
            $('#message-modal').modal();
        });
  
       $(document).on('submit', '#message-admin-form', function(e) {  
            e.preventDefault();
              
            $('input+small').text('');
            $('input').parent().removeClass('has-error');
              
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                //dataType: "json"
            })
            .done(function(data) {
                console.log(data);
                $('.alert-success').removeClass('hidden');
                $('#message-modal').modal('hide');
            })
            .fail(function(data) {
                console.log(data);
                $.each(data.responseJSON, function (key, value) {
                    var input = '#message-form input[name=' + key + ']';
                    $(input + '+small').text(value);
                    $(input).parent().addClass('has-error');
                });
            });
        });
  
    })
  
    </script>
</body>
</html>
