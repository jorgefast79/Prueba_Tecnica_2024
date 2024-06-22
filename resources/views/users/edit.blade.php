@extends('layout')

@section('content')
	<h1>Editar usuario</h1>
	@if(session()->has('info'))
		<div class="alert alert-sucess">{{ session('info') }}</div>
	@endif

	<form method="POST" action="{{ route('users.update', $user->id) }}">
		{!! method_field('PUT') !!}
		
		@include('users.form')

		<button class="btn-primary">Guardar</button>

	</form>
@stop