@extends('app')

@section('content')
	<h2>Projects</h2>
	<hr>

	@if (!$projects->count())
		You have no projects.
	@else
		<ul>
			@foreach ($projects as $project)
				<li><h3>
						{!! Form::open(['class' => 'form-inline', 'method' => 'DELETE', 'route' => ['projects.destroy', $project->slug] ]) !!}
							{!! link_to_route('projects.show', $project->name, [$project->slug]) !!}
							{!! link_to_route('projects.edit', 'Edit', [$project->slug], ['class' => 'btn btn-info']) !!}
							{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
						{!! Form::close() !!}
				</h3>
				</li>
			@endforeach
		</ul>
	@endif

	<hr>
	<p>
		{!! link_to_route('projects.create', 'Create New Project') !!}
	</p>
@stop