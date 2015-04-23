@extends('app')

@section('content')
	<h2>
	{!! Form::open(['class' => 'form-inline main-link', 'method' => 'DELETE', 'route' => ['projects.destroy', $project->slug] ]) !!}
		{{ $project->name }}
		<span class="action">
		{!! link_to_route('projects.edit', 'Edit', [$project->slug], ['class' => 'btn btn-info']) !!}
		{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
		</span>
	{!! Form::close() !!}
	</h2>

	<p>{{$status}}</p>

	@if ($project->tasks()->incompleted()->count() !== 0)
	<hr>
	<ul>
		@foreach ($project->tasks()->incompleted()->get() as $task)
			<li>
			{!! Form::open(['class' => 'form-inline', 'method' => 'DELETE', 'route' => ['projects.tasks.destroy', $project->slug, $task->slug] ]) !!}
				{!! link_to_route('projects.tasks.show', $task->name, [$project->slug, $task->slug]) !!}
				{!! link_to_route('projects.tasks.complete', 'Mark as Completed', [$project->slug, $task->slug], ['class' => 'btn btn-primary']) !!}
				{!! link_to_route('projects.tasks.edit', 'Edit', [$project->slug, $task->slug], ['class' => 'btn btn-info']) !!}
				{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
			{!! Form::close() !!}
			</li>
		@endforeach
	</ul>
	@endif

	<hr>
	<p>
		{!! link_to_route('projects.index', 'Back to Projects') !!} |
		{!! link_to_route('projects.tasks.create', 'Create new task', [$project->slug]) !!}
	</p>
@stop