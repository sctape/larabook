@extends('layouts.default')

@section('content')
<div class="jumbotron">
    <h1>Welcome to Larabook!</h1>
    <p>Blah blah blah laravel is cool!</p>
    <p>{{ link_to_route('register_path', 'Sign Up!', null, ['class' => 'btn btn-lg btn-primary']) }}</p>
</div>

@stop