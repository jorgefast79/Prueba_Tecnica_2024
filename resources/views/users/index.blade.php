@extends('layout')

@section('content')

	<h1>Usuarios</h1>

	<div class="container">
        <div class="d-flex justify-content-center align-items-center" style="height: 25vh;">
            <div class="search w-50">
                <h1 class="text-center mb-5">Search an user</h1>
                <form action="{{ route('users.search')}}" id="search-form" method="GET">
                    @csrf
                    <div class="row">
                        <div class="col-12" id="search-wrapper">
                            <input type="text" class="form-control w-100 m-0 search" placeholder="Who are you looking for .. " name="request" value="{{ ($text == null || $text != '') ? $text : ''}}">
                            	<div id="results">

                            	</div>
                            	<div id="post" class="col-2 mt-2 align-items-center">
			                 					<input type="submit"  class="btn btn-info btn-xs" value="Buscar">
																</input>
                							</div>
                        	</div>
                    	</div>
                	</form>
            </div>
        </div>
    </div>

	<a class="btn btn-success" href="{{ route('users.create') }}">Crear nuevo usuario</a>	
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Role</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			@if(count($users) > 0)
				@foreach ($users as $user)
					<tr>
						<td> {{ $user->id }}</td>
						<td> {{ $user->name }}</td>
						<td> {{ $user->email }}</td>
						<td> 
							@foreach($user->roles as $role)
								{{ $role->display_name }}
				@endforeach
						</td>
						<td>
							<a class="btn btn-info btn-xs"
							href="{{ route('users.edit', $user->id) }}">
								Editar
							</a>
							<form style="display: inline"
							method="POST"
							action="{{ route('users.destroy', $user->id) }}">
							{!! csrf_field() !!}
							@csrf @method('DELETE')

							<button class="btn btn-danger btn-xs">Eliminar</button>
							</form>
						</td>
					</tr>
				@endforeach
			@else
			<td colspan="8">No hay resultados</td>
			@endif
		</tbody>
	</table>
@stop