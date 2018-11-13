@extends('layouts.app')

@section('content')
	<div>
		@if(isset(auth()->user()->id))
			@if(auth()->user()->id == $user->id)
				<h1 style="display: inline-block">My profile</h1>
			@endif
		@else
			<h1 style="display: inline-block">{{$user->name}}'s profile</h1>
		@endif
			<a href="#" class="myButton float-right">follow</a>
		</div>
	@if(count($user->post) > 0)
		@foreach($user->post->sortByDesc('created_at') as $post)
			<div class="well" style="margin-bottom: 70px; margin-top: 20px; text-align: center; padding-left: 30px; border-left: solid 3px #343a40;">
				<div style="overflow: hidden; margin-bottom: 20px">
					<h3 style="float: left; text-align: left; display: inline-block">{{$post->title}}</h3>
					<button id="{{$post->id}}" onclick="TitleOn(this.id)" style="float: left; margin-left: 2vw;" class="btn btn-primary">Edit</button>
					@if(isset(auth()->user()->id))
						@if(auth()->user()->id == $user->id || auth()->user()->admin)
							{!! Form::open(['action' => ['PostsController@update', $post->id], 'id' => 'editTitle'.$post->id, 'style' => 'display: inline-block; float:left; margin-left: 10px; visibility: hidden']) !!}
								{{Form::hidden('_method', 'PUT')}}
								{{Form::text('title', $post->title, ['placeholder' => 'Edit title', 'style' => 'margin-left: 10px'])}}
								{{Form::submit('Submit', ['class' => 'btn btn-secondary'])}}
							{!! Form::close() !!}

						
									{!! Form::open(['action' => ['PostsController@destroy', $post->id], 'class' => 'float-right']) !!}
										{{Form::hidden('_method', 'DELETE')}}
										{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
									{!! Form::close() !!}
						@endif
					@endif
				</div>
				@if(!$post->video)
						<img style="max-width: 50vw; max-height: 500px" src="/storage/{{$post->url}}" alt="Jah tuki naj bi bla slika">
					@else
						<video style="width: 50vw; max-height: 500px" controls>
							<source src="/storage/{{$post->url}}" type="video/{{$post->type}}">
						</video>

					@endif
				<br><br>
				<p style="text-align: left">{{$post->description}}<br><small>{{date('d m Y, H:i:s', strtotime($post->created_at))}}, by {{$post->user->name}}</small></p>
				
			</div>
		@endforeach
	@else
		<p>User has no posts</p>
	@endif
@endsection