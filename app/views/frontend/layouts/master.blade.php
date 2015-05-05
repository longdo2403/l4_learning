<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>TTV - {{@$title}}</title>
    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('packages/utils/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('packages/css/style.css')}}">
    <!-- Jquery Libs -->
    <script type="text/javascript" src="{{asset('packages/js/jquery-1.9.1.min.js')}}"></script>
</head>
<body>
    <section class="container">
        <div class="w-container">
            @if(Session::has('message'))
                <div class="alert alert-<?= @Session::get('message')['type'] ?>">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <p>{{ Session::get('message')['mess'] }}</p>
                </div>
                
            @endif
            @yield('content')
        </div>
    </section>
    <!-- javascript -->
    <script type="text/javascript" src="{{asset('packages/utils/bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>