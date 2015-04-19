@extends('app')

@section('content')
	<h2>Create New Project</h2>
	<hr>

	{!! Form::model(new App\Project, ['route' => ['projects.store']] ) !!}

		@include('projects.partials._form', ['button_name' => 'Create Project'])

	{!! Form::close() !!}

@stop