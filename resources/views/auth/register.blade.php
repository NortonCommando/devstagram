@extends('layouts.app')

@section('titulo')
    Regístrate
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:items-center md:gap-8">
        <div class="md:w-6/12 md:gap-4 md:items-center">
            <img src="{{ asset('img/registrar.jpg') }}" />
        </div>
        <div class="md:w-4/12 mb-5 bg-white rounded-lg p-6 shadow-xl">
            <form>
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nombre </label>
                    <input type="text" id="name" name="name" placeholder="Tu nombre" class="border p-3 w-full rounded-lg" />
                </div>
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Nombre de usuario </label>
                    <input type="text" id="username" name="username" placeholder="Tu nombre de usuario" class="border p-3 w-full rounded-lg" />
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email </label>
                    <input type="text" id="email" name="email" placeholder="Email" class="border p-3 w-full rounded-lg" />
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password </label>
                    <input type="password" id="password" name="password" placeholder="Password" class="border p-3 w-full rounded-lg" />
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repetir password </label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repetir password " class="border p-3 w-full rounded-lg" />
                </div>
                <input type="submit" 
                value="Crear cuenta"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold p-3 text-white rounded-lg w-full"/>
            </form>
        </div>
    </div>
@endsection
