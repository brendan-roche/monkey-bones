@extends('layouts.common')

@section('title')
	The Monkeys Test
@stop

@section('body')

    <div id="errors">
    @foreach ($errors as $error)
        <p>{{{ $error }}}</p>
    @endforeach
    </div>

    {{ Form::open(array('url' => '/')) }}

    @foreach ($fields as $name => $field)
        <p>
        {{ Form::label($name, $field['label']) }}:
        @if ($field['type'] == 'text')
            {{ Form::text($name, Input::old($name)) }}
        @elseif ($field['type'] == 'email')
            {{ Form::email($name, Input::old($name)) }}
        @elseif ($field['type'] == 'textarea')
            {{ Form::textarea($name, Input::old($name)) }}
        @elseif ($field['type'] == 'select')
            {{ Form::select($name, $field['options'], Input::old($name)) }}
        @endif
        </p>
    @endforeach

    <p>
    {{ Form::submit('Submit') }}
    </p>

    {{ Form::close() }}

@stop