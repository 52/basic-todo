@extends('app')

@section('content')
	<h2>Create New Task for Project: {{ $project->name }}</h2>
	<hr>

	{!! Form::model(new App\Task, ['route' => ['projects.tasks.store', $project->slug]] ) !!}

		@include('tasks.partials._form', ['button_name' => 'Create Task'])

	{!! Form::close() !!}

@stop