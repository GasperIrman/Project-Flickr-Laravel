@extends('layouts.app')

@section('content')
	<h1>Home</h1>
	@if(count($posts) > 0)
		@foreach($posts as $post)
			<div class="well" style="margin-bottom: 30px">
				<h3>{{$post->title}}</h3>
				<img style="width: 50vw;" src="/storage/{{$post->url}}" alt="Jah tuki naj bi bla slika">
				<p>{{$post->description}}<br><small>{{$post->created_at}}</small></p>
				
			</div>
		@endforeach
	@else
		<p>No posts found</p>
	@endif
@endsection