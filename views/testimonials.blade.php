@extends('base')

@section('browsertitle')
	Testimonials
@endsection

@section('maincontent')
	<h1>Testimonials</h1>
	<div class="list-group">
		<a href="#" class="list-group-item active">
			<h4 class="list-group-item-heading">Testimonials</h4>
		</a>
		@foreach ($testimonials as $testimonial)
			<a href="#" class="list-group-item">
				<h4 class="list-group-item-heading">{!! $testimonial->title !!}</h4>
				<p class="list-group-item-text">{!! date("d. F, Y", strtotime($testimonial->created_at)) !!}</p>
				<p>{!! $testimonial->testimonial !!}</p>
			</a>
		@endforeach
	</div>
@stop