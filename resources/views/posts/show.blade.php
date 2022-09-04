@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="container mx-auto flex gap-3">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}" />
            <div class="p-3">
                <p>0 likes</p>
            </div>
            <a class="font-bold italic" href="{{ route('posts.index', $post->user) }}">{{ $post->user->username }} </a>
            <p class="text-sm text-gray-500">
                {{ $post->created_at->diffForHumans() }}
            </p>
            <p class="mt-5">{{ $post->descripcion }}</p>
        </div>
        <div class="md:w-1/2">
            <div class="shadow bg-white mb-5  p-5">
                @auth
                    <p class="text-lg font-bold text-center mb-4">Comentarios</p>
                    <form>
                        @csrf
                        <div class="mb-5">
                            <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">
                                Agrega un comentario </label>
                            <textarea id="comentario" name="comentario" placeholder="Agrega un comentario"
                                class="border p-3 w-full rounded-lg @error('comentario') border-red-500 @enderror"></textarea>
                            @error('comentario')
                                <p class="bg-red-500 mt-5 text-white rounded-lg text-sm text-center p-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <input type="submit" value="Agregar comentario"
                            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold p-3 text-white rounded-lg w-full" />
                    </form>
                @endauth

            </div>

        </div>

    </div>
@endsection
