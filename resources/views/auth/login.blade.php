@extends('layouts.app')

@section('titulo')
	Inicia Sesion en DevStagram
@endsection

@section('contenido')

	<div class="md:flex md:justify-center md:gap-6 md:items-center">
		<div class="md:w-5/12 p-5">
			<img src="{{ asset('img/login.jpg') }}" alt="Imagen registrar">
		</div>

		<div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
			<form method="POST" action="{{ route('login') }}" novalidate>
				@csrf

                @if (session('mensaje'))
                    
                    <p 
                        class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ session('mensaje') }}
                    </p>
                    
                @endif
				<div class="mb-5">
					<label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
						Email
					</label>
					<input type="email" name="email" id="email" placeholder="Tu correo electronico" class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}">

					@error('email')
						<p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
					@enderror
				</div>
				<div class="mb-5">
					<label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
						Contrasena
					</label>
					<input type="password" name="password" id="password" placeholder="Tu contrasena" class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror">

					@error('password')
						<p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
					@enderror
				</div>

				<input 
					type="submit"
					value="Iniciar Sesion" 
					class="bg-sky-600 hover:bg-sky-700 transition-colors uppercase font-bold w-full p-3 text-white rounded-lg" 
				>
			</form>
		</div>
	</div>

@endsection