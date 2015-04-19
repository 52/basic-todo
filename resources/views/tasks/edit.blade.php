@extends('app')

@section('content')

	<h2>Edit Task: {{ $task->name }} of Project: {{ $project->name }}</h2>
	<hr>

	{!! Form::model($task, ['method' => 'PATCH', 'route' => ['projects.tasks.update', $project->slug, $task->slug]] ) !!}

		@include('tasks.partials._form', ['button_name' => 'Edit Task', 'is_edited' => true])

	{!! Form::close() !!}

@stop