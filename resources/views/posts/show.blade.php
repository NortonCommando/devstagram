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
            @auth
                @if (auth()->user()->id == $post->user_id)
                    <form>
                        <input type="submit" class="bg-red-500 hover:bg-red-700 rounded text-white mt-4 p-2 cursor-pointer"
                            value="Eliminar publicacion" />
                    </form>
                @endif
            @endauth

        </div>

        <div class="md:w-1/2">
            <div class="shadow bg-white mb-5  p-5">
                @auth
                    <p class="font-bold text-center mb-4">Comentarios</p>
                    @if (session('mensaje'))
                        <div
                            class="bg-green-500 p-2 rounded-lg mb-6
                         text-white text-center uppercase font-bold text-sm">
                            {{ session('mensaje') }}
                        </div>
                    @endif
                    <form action="{{ route('comentarios.store', ['user' => $post->user, 'post' => $post]) }}" method="POST">
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
                <p>{{ $post->comentarios->count() }} Comentarios</p>
                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll">
                    @if ($post->comentarios->count())
                        @foreach ($post->comentarios as $comentario)
                            <div class="p-2 border-gray-300 border-b m-2">
                                <a href="{{ route('posts.index', $comentario->user) }}"
                                    class="text-sm font-semibold">{{ $comentario->user->username }}</a>
                                <p>{{ $comentario->comentario }}</p>
                                <p class="text-sm text-gray-500 text-right">{{ $comentario->created_at->diffForHumans() }}
                                </p>
                            </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center">No hay comentarios</p>
                    @endif
                </div>



            </div>

        </div>

    </div>
@endsection
