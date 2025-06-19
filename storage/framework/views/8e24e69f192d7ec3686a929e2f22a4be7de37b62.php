<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/athena.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/plugins/jcrop.min.js')); ?>" defer></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/athena.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/plugins/jcrop.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
            <div class='row menu'>
                <div class='col-md-2'>
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">Clairesprit</a>            
                </div>                
                <div class="collapse navbar-collapse col-md-10" id="navbarSupportedContent"> 
                    <ul class="navbar-nav">   
                        <li class="nav-item dropdown">                           
                                <a id="navbarDropdown2" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Catégories</a>
                            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown2">
                                <?php $__currentLoopData = App\Models\Book\Category::getAll(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="dropdown-item" href="<?php echo e(url('category/'.$cat->id.'/'.$cat->slug)); ?>"><?php echo e($cat->name); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                 
                            </div>
                        </li>
                    </ul>     
                    <div class='search-zone'>
                        <input type='text' class='search' data-url="<?php echo e(url('search')); ?>" placeholder="Votre recherche">                        
                    </div>              
                    <ul class="navbar-nav ml-auto">                       
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>">Se connecter</a>
                            </li>
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>">S'inscrire</a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                             
                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img class='avatar' src="<?php echo e(url('images/avatar/crop/'.Auth::user()->getAvatar())); ?>" />
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(url('settings')); ?>">Paramètres</a>
                                    <a class="dropdown-item" href="<?php echo e(url('/book/interaction/interest')); ?>">Favoris</a>
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Déconnexion
                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            </div>
        </nav>

        <main>
            <?php echo $__env->make('layouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->yieldContent('content'); ?>
            <div id="button-modal">Proposer un livre</div>
        </main>
        <hr>
        <footer class='main-footer'>
            <span><?php echo e(date('Y')); ?> Athena</span>
        </footer>
        <?php echo $__env->make('requests.modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
<?php /**PATH C:\wamp\www\athena\resources\views/layouts/app.blade.php ENDPATH**/ ?>