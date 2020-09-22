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
				<li class="nav-item"><a href="/logout" class="nav-link">Logout</a></li>
			@else
				<li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
			@endif
			<!-- <li class="nav-item"><a class="nav-link" href="/testdb">Database</a></li> -->
		</ul>
	</div>
</nav>