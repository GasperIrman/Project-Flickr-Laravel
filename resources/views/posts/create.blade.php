@extends('layouts.app')

@section('content')
	<h1>Create a post</h1>
	{!! Form::open(['action'=> 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
		<div class="form-group">
    		{{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title']) }}
    	</div>

    	<div class="form-group">
    		{{ Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Description']) }}
    	</div>

    	<div class="form-group">
        	{{ Form::file('image') }}
    	</div>
    	{{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
		{!! Form::close() !!}
		<!--<input class="form-control" type="text" placeholder="Title" name="title"><br>
		<!--<input class="form-control" type="text" placeholder="Description" name="desc"><br>
		<!--<input class="" type="file" name="img">
		<!--<input style="float: right" class="btn btn-primary" type="submit" name="img">
@endsection