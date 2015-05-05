@extends('frontend.layouts.master')
@section('content')
<form class="form-horizontal" method="post" action="">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <div class="w-nav" data-collapse="medium" data-animation="default" data-duration="400" data-contain="1">
      <div class="w-container">
        <a class="w-nav-brand" href="#"></a>
        <nav class="w-nav-menu" role="navigation"><a class="w-nav-link" href="{{route('login')}}">Home</a>
        </nav>
        <div class="w-nav-button">
          <div class="w-icon-nav-menu"></div>
        </div>
      </div>
    </div>
    <?php $errs = $errors->all(); ?>
    @if (!empty($errs))
    <p class="alert alert-danger">
    @foreach ($errors->all() as $error)
        {{ $error }} <br>
    @endforeach
    </p>
    @endif
    <h1>Login</h1>
    <label for="UserName">Username:</label>
    <input class="w-input" id="UserName" type="text" placeholder="Enter your username" name="username" value="{{(Input::old('username'))}}" data-name="UserName" required="required">
    <label for="Password">Password:</label>
    <input class="w-input" id="Password" type="password" placeholder="Enter your password" name="password" value="{{(Input::old('password'))}}" data-name="Password" required="required">
    <div class="w-row">
      <div class="w-col w-col-6"></div>
      <div class="w-col w-col-6">
        <input class="w-button" type="submit" value="Login" data-wait="Please wait...">
      </div>
    </div>
</form>

@stop