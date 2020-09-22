<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="/">Featherz</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarColor01">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active"><a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a></li>
			<li class="nav-item"><a class="nav-link" href="/about-acme">About</a></li>
			<li class="nav-item"><a class="nav-link" href="/register">register</a></li>
			<li class="nav-item"><a class="nav-link" href="/testimonials">Testimonials</a></li>
			@if(Acme\auth\LoggedIn::user())
				<li class="nav-item"><a href="/add-testimonial" class="nav-link">Add a Testimonial</a></li>
			@endif
		</ul>
		<ul class="nav navbar-nav navbar-right">
			@if(Acme\auth\LoggedIn::user())
				<div class="dropdown">
				  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    Admin
				  </button>
				  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				    <a class="dropdown-item" href="#">Edit page</a>
<!-- 				    <hr>
				    <a class="dropdown-item" href="#">Another action</a>
				    <a class="dropdown-item" href="#">Something else here</a> -->
				  </div>
				</div>
				<li class="nav-item">
					<a href="/logout" class="nav-link"><span class="glypicon glypicon-lock" aria-hidden="true"></span>Logout</a>
				</li>
			@else
				<li class="nav-item">
					<a href="/login" class="nav-link"><span class="glypicon glypicon-lock" aria-hidden="true"></span>Login</a>
				</li>
			@endif
		</ul>
	</div>
</nav>