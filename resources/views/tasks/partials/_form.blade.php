<div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
	{!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
	<span class="help-block">{{ $errors->first('name') }}</span>
</div>

@if (isset($is_edited))
	<div class="form-group">
		{!! Form::checkbox('completed', null, ['class' => 'form-control']) !!}
		{!! Form::label('completed', 'Mark as completed') !!}
	</div>
@endif

<div class="form-group {{ $errors->first('description') ? 'has-error' : '' }}">
	{!! Form::label('description', 'Description:') !!}
	{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
	<span class="help-block">{{ $errors->first('description') }}</span>
</div>

<div class="form-group">
	{!! Form::submit($button_name, ['class' => 'btn btn-primary']) !!}
</div>