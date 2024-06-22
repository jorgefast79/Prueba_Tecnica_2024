@extends('layout')

@section('content')
	<h1>Crear nuevo usuario</h1>

	<form method="POST" action="{{ route('users.store') }}">
		
		@include('users.form', ['user' => new App\Models\User])

		<button class="btn-primary">Guardar</button>

	</form>

@stop