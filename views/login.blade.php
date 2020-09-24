@extends('base')

@section('browsertitle')
Login
@endsection

@section('maincontent')
	<h1>Login page</h1>
	<hr>

	@if (isset($_SESSION['msg']))
		<div class="alert alert-danger" role="alert">
			<ul>
				@foreach($_SESSION['msg'] as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<form class="form-horizontal" action="/login" method="post">
		<div class="form-group">
			<label for="email">Email</label>
			<div class="col-sm-10">
				<input type="email" name="email" class="form-control" id="email" placeholder="user@example.com">
			</div>
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<div class="col-sm-10">
				<input type="password" name="password" class="form-control" id="password" placeholder="Password">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-10">
				<input type="hidden" name="_token" value="{{$CSRF}}">
				<button type="submit" class="btn btn-primary">Sign in</button>
			</div>
		</div>
	</form>
@endsection

@section('bottomjs')
	<script>
			// alert("this should only show up on the Login page");
	</script>
@endsection