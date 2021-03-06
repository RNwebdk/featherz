@extends('base')

@section('browsertitle')
Register
@endsection

@section('maincontent')

		<div class="row">
			<div class="col-md-2">
				
			</div>

			<div class="col-md-10">

				<h1>Register</h1>
				<hr>

				<form class="form-horizontal" id="registerform" action="/register" method="post" novalidate>

					<div class="form-group">
						<label for="first_name" class="col-sm-2 control-label">First Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control required" id="first_name" name="first_name" placeholder="First Name">
						</div>
					</div>

					<div class="form-group">
						<label for="last_name" class="col-sm-2 control-label">Last Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control required" id="last_name" name="last_name" placeholder="Last Name">
						</div>
					</div>

					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control required email" id="email" name="email" placeholder="user@example.com">
						</div>
					</div>

					<div class="form-group">
						<label for="verify_email" class="col-sm-2 control-label">Verify Email</label>
						<div class="col-sm-10">
							<input type="text" class="form-control required" id="verify_email" name="verify_email" placeholder="user@example.com">
						</div>
					</div>

					<div class="form-group">
						<label for="password" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control required" id="password" name="password" placeholder="Password">
						</div>
					</div>

					<div class="form-group">
						<label for="verify_password" class="col-sm-2 control-label">Verify Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control required" id="verify_password" name="verify_password" placeholder="Verify Password">
						</div>
					</div>
					<hr>
					<div class="form-group">
						<div class="col-sm-10">
							<input type="hidden" name="_token" value="{{$CSRF}}">
							<input type="submit" value="Register" class="btn btn-primary">
						</div>
					</div>

				</form>
			</div>
		</div>
@endsection

@section('bottomjs')
	<script>
			// alert("this should only show up on the register page");
	</script>
@endsection