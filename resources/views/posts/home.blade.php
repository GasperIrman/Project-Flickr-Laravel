@extends('layouts.app')

@section('content')
	<h1>Home</h1>
	@if(count($posts) > 0)
		@foreach($posts as $post)
			<div class="well" style="margin-bottom: 70px; margin-top: 20px; text-align: center; padding-left: 30px; border-left: solid 3px #343a40;">
				<div style="overflow: hidden; margin-bottom: 20px">
					<h3 style="float: left; text-align: left; display: inline-block">{{$post->title}}</h3>
					

					
                @if(isset(auth()->user()->id))
					@if(auth()->user()->id == $post->user->id || auth()->user()->admin)
					<button id="{{$post->id}}" onclick="TitleOn(this.id)" style="float: left; margin-left: 2vw;" class="btn btn-primary">Edit</button>

						{!! Form::open(['action' => ['PostsController@update', $post->id], 'id' => 'editTitle'.$post->id, 'style' => 'display: inline-block; float:left; margin-left: 10px; visibility: hidden']) !!}
							{{Form::hidden('_method', 'PUT')}}
							{{Form::text('title', $post->title, ['placeholder' => 'Edit title', 'style' => 'margin-left: 10px'])}}
							{{Form::submit('Submit', ['class' => 'btn btn-secondary editSubmit'])}}
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
					<p style="text-align: left">{{$post->description}}<br><small>{{date('d m Y, H:i:s', strtotime($post->created_at))}}, by <a href="/users/{{ $post->user->id }}">{{$post->user->name}}</a></small></p>
					
			</div>
		@endforeach
	@else
		<p>No posts found</p>
	@endif
<script>
	function TitleOn(id)
	{
	    var form = "editTitle" + id;
	    console.log(form);
	    document.getElementById(form).style.visibility="visible";
	}
	function ContentOn(id)
	{
	    var form = "editContent" + id;
	    console.log(form);
	    document.getElementById(form).style.visibility="visible";
	}
</script>
@endsection