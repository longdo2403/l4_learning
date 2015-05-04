<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TTV Exam </title>
    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('packages/utils/bootstrap/css/bootstrap.min.css')}}">
    <!-- Jquery Libs -->
    <script type="text/javascript" src="{{asset('packages/js/jquery-1.9.1.min.js')}}"></script>
</head>
<body>
    <div class="col-md-6 col-md-offset-3" style="margin-top: 50px;">
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
    <!-- javascript -->
    <script type="text/javascript" src="{{asset('packages/utils/bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>