@extends('layouts.app')

@section('titulo')
    Editar mi perfil
@endsection


@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form class="mt-10 md:mt-0" method="POST" enctype="multipart/form-data" action="{{ route('perfil.store') }}">
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Nombre de usuario </label>
                    <input type="text" id="username" name="username" placeholder="Tu nombre de usuario"
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                        value="{{ auth()->user()->username }}" />
                    @error('username')
                        <p class="bg-red-500 mt-5 text-white rounded-lg text-sm text-center p-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">Imagen de perfil </label>
                    <input type="file" id="imagen" name="imagen" placeholder="Tu imagen de perfil"
                        accept=".jpg, .jpeg, .png"
                        class="border p-3 w-full rounded-lg" />
                </div>
                <input type="submit" value="Guardar cambios"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold p-3 text-white rounded-lg w-full" />
            </form>
        </div>
    </div>
@endsection
