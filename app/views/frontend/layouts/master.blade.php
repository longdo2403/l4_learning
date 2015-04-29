<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TTV Exam </title>
    <link rel="stylesheet" href="{{asset('packages/utils/bootstrap/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="col-md-6 col-md-offset-3 ">
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
</body>
</html>