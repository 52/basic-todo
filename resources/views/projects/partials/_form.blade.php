<div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
	{!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
	{!! Form::text('name',null, ['class' => 'form-control']) !!}
	<span class="help-block">{{ $errors->first('name') }}</span>
</div>

<div class="form-group">
	{!! Form::submit($button_name, ['class' => 'btn btn-primary']) !!}
</div>