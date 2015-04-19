@extends('app')

@section('content')
    <h2>
    	{!! Form::open(['class' => 'form-inline', 'method' => 'DELETE', 'route' => ['projects.tasks.destroy', $project->slug, $task->slug] ]) !!}
        	{!! link_to_route('projects.show', $project->name, [$project->slug]) !!} -
        	{{ $task->name }}
        	{!! link_to_route('projects.tasks.edit', 'Edit', [$project->slug, $task->slug], ['class' => 'btn btn-info']) !!}
        	{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    	{!! Form::close() !!}
    </h2>

    {{ $task->description }}
@endsection