@extends('app')

@section('content')
	<h2>{{ $project->name }}</h2>
	<hr>

	@if (!$project->tasks()->count())
		Your project has no tasks.
	@else
		<ul>
			@foreach ($project->tasks as $task)
				<li><a href="{{ route('projects.tasks.show', [$project->slug, $task->slug]) }}">{{ $task->name }}</a></li>
			@endforeach
		</ul>
	@endif

@stop