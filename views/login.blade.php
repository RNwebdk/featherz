@extends('base')

@section('browsertitle')
Login
@endsection

@section('maincontent')
	<h1>Login page</h1>
	<hr>
	<form class="form-horizontal" action="#" method="post">
		<div class="form-group">
			<label for="username">Email</label>
			<div class="col-sm-10">
				<input type="email" name="username" class="form-control" id="username" placeholder="user@example.com">
			</div>
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<div class="col-sm-10">
				<input type="password" name="" class="form-control" id="password" placeholder="Password">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-10">
				<button type="submit" class="btn btn-primary">Sign in</button>
			</div>
		</div>
	</form>
@endsection

@section('bottomjs')
	<script>
			alert("this should only show up on the Login page");
	</script>
@endsection