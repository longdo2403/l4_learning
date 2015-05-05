@extends('frontend.layouts.master')
@section('content')
<div class="pagenot">
	<h2>404</h2>
	<div class="pagenot-text">
		<h3>Oops No Resource Found</h3>
	</div>
	<p>It looks like nothing was found at this location. <a href="{{route('member.product')}}">Go Back To Product Page.</a> </p>
</div>
@stop