{!! csrf_field() !!}

		<p><label for="Nombre">
			Nombre
			<input class="form-control" type="text" name="name" value="{{ ($user->name != '') ? $user->name : old('name')}}">
			{!! $errors->first('name', '<span class=error>:message</span>') !!}
		</label></p>
		<p><label for="Nombre">
			Email
			<input class="form-control" type="text" name="email" value="{{ ($user->email != '') ? $user->email : old('email')}}">
			{!! $errors->first('email', '<span class=error>:message</span>') !!}
		</label></p>

		@unless($user->id)

		<p><label for="Password">
			Password
			<input class="form-control" type="password" name="password" value="">
			{!! $errors->first('password', '<span class=error>:message</span>') !!}
		</label></p>
		<p><label for="Password">
			Password Confirm
			<input class="form-control" type="password" name="password_confirmation" value="">
			{!! $errors->first('password_confirmation', '<span class=error>:message</span>') !!}
		</label></p>

		@endunless

		<div class="checkbox" name='roles'>
			
			@foreach ($roles as $id => $name)

				<input type="checkbox" 
				value="{{ $id }}" 
				{{ $user->roles->pluck('id')->contains($id) ? 'checked' : '' }}
				name="roles[]">
				{{ $name }}
			@endforeach
			{!! $errors->first('roles', '<span class=error>:message</span>') !!}
			<hr>
		</div>