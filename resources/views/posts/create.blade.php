@extends('layouts.app')

@section('content')
	<h1>Create a post</h1>
	<form action="PostsController@store" method="post" enctype="multipart/form-data">
		<input class="form-control" type="text" placeholder="Title" name="title"><br>
		<input class="form-control" type="text" placeholder="Description" name="desc"><br>
		<input class="" type="file" name="img">
		<input style="float: right" class="btn btn-primary" type="submit" name="img">
	</form>
@endsection