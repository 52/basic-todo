@extends('app')

@section('content')

	<h2>Edit Project: {{ $project->name }}</h2>
	<hr>

	{!! Form::model($project, ['method' => 'PATCH', 'route' => ['projects.update', $project->slug]] ) !!}

		@include('projects.partials._form', ['button_name' => 'Edit Project'])

	{!! Form::close() !!}

@stop