@extends('layouts.common')

@section('title')
	The Monkeys Test
@stop

@section('body')

    <div id="success" class="{{ $success ? '' : 'hidden'}}">
        <p>Thanks for your feedback.</p>
        <p>Someone will get back to you soon.</p>
    </div>

    <div id="formContainer" class="{{ $success ? 'hidden' : ''}}">
    <div id="errors">
        @foreach ($errors as $error)
        <p>{{{ $error }}}</p>
        @endforeach
    </div>

    {{ Form::open(array('url' => '/', 'id' => 'enquiryForm')) }}

    @foreach ($fields as $name => $field)
    <p><span class="{{ in_array('required', $field['attributes']) ? '' : 'hidden' }}">*</span> {{ Form::label($name, $field['label']) }}:
        @if ($field['type'] == 'text')
            {{ Form::text($name, Input::old($name), $field['attributes']) }}
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
    </div>
@stop