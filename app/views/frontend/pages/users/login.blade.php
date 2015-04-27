@extends('frontend.layouts.master')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">Login Form</div>
  <div class="panel-body">
    <form class="form-horizontal" method="post" action="">
        @if(Session::has('message'))
            {{ Session::get('message') }}
        @endif
        <?php $errs = $errors->all(); ?>
        @if (!empty($errs))
        <p class="alert alert-danger">
        @foreach ($errors->all() as $error)
            {{ $error }} <br>
        @endforeach
        </p>
        @endif
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <div class="form-group <?= $errors->has('username') ? 'has-error' : '' ?>" >
        <label class="col-sm-3 control-label">Username</label>
        <div class="col-sm-7">
          <input type="text" class="form-control" value="{{(Input::old('username'))}}" name="username">
        </div>
      </div>
      
      <div class="form-group <?= $errors->has('password') ? 'has-error' : '' ?>" >
        <label class="col-sm-3 control-label">Password</label>
        <div class="col-sm-7">
          <input type="password" class="form-control" value="{{(Input::old('password'))}}" name="password">
        </div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-8">
          <input type="submit" class="btn btn-primary" value="Submit">
        </div>
      </div>
    </form>
  </div>
</div>
@stop