@extends('layout')


@section('title')

	Users

@endsection

@section('content')

	<h1>Users</h1>

	<ul>
		
		@forelse($users as $userItem)
			<li> {{ $userItem['title'] }}</li>
		@empty
			<li>No hay usuarios para mostrar</li>
		@endforelse
			
	</ul>


@endsection