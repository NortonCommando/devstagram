@extends('layouts.app')

@section('titulo')
    Inicia sesión
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:items-center md:gap-8">
        <div class="md:w-6/12 md:gap-4 md:items-center">
            <img src="{{ asset('img/login.jpg') }}" />
        </div>
        <div class="md:w-4/12 mb-5 bg-white rounded-lg p-6 shadow-xl">
            <form action="{{ route('login') }}" method="POST" novalidate>
                @csrf
                @if (session('mensaje'))
                    <p class="bg-red-500 mt-5 text-white rounded-lg text-sm text-center p-1">{{ session('mensaje') }}</p>
                @endif
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email </label>
                    <input type="text" id="email" name="email" placeholder="Email"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}" />
                    @error('email')
                        <p class="bg-red-500 mt-5 text-white rounded-lg text-sm text-center p-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password </label>
                    <input type="password" id="password" name="password" placeholder="Password"
                        class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror" />
                    @error('password')
                        <p class="bg-red-500 mt-5 text-white rounded-lg text-sm text-center p-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="checkbox" class="cursor-pointer" name="remember" id="remember" />
                    <label for="remember" class="text-gray-500 cursor-pointer">Mantener sesión abierta</label>
                </div>

                <input type="submit" value="Iniciar sesión"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold p-3 text-white rounded-lg w-full" />
            </form>
        </div>
    </div>
@endsection
