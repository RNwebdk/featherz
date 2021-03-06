@extends('base')

@section('maincontent')

	<h1>Add Testimonial</h1>

	<form method="post" action="/add-testimonial" name="testimonialform" class="form-horizontal" id="testimonialform">

		<div class="form-group">
			<label for="title" class="col-sm-2 control-label">Title</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" required id="title" name="title" placeholder="Title"> 
			</div>
		</div>

		<div class="form-group">
			<label for="testimonial" class="col-sm-2 control-label">Testimonial</label>
			<div class="col-sm-10">
				<textarea class="form-control" name="testimonial" placeholdeR="Testimonial"></textarea>
			</div>
		</div>

		<hr>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="hidden" name="_token" value="{{$CSRF}}">
				<button type="submit" class="btn btn-primary">Save Testimonial</button>
			</div>
		</div>
	</form>

	<br>
	<br>
@stop

