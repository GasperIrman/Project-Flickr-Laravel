@extends('layouts.app')

@section('content')
	<h1>Home</h1>
	@if(count($posts) > 0)
		@foreach($posts as $post)
			<div class="well">
				<h3>{{$post->title}}</h3>
				<p>{{$post->description}}</p>
				<small>{{$post->created_at}}</small>
			</div>
		@endforeach
	@else
		<p>No posts found</p>
	@endif
@endsection