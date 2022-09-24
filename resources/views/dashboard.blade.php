@extends('layouts.app')

@section('titulo')
    Perfil: {{ $user->username }}
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img class="rounded-full"
                    src="{{ $user->imagen ? asset('perfiles' . '/' . $user->imagen) : asset('img/usuario.svg') }}" />
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col md:justify-center items-center md:items-start py-10 md:py-10">
                <div class="flex text-center gap-2">
                    <p class="text-gray-700 text-2xl mb-5">{{ $user->username }}</p>

                    @auth
                        @if ($user->id === auth()->user()->id)
                            <a href="{{ route('perfil.index') }}" class="text-gray-500 hover:text-gray-600 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                </svg>
                            </a>
                        @endif
                    @endauth
                </div>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{ $user->followers->count() }}
                    <span class="font-normal">@choice('Seguidor|Seguidores', $user->followers->count()) </span>

                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{ $user->followings->count() }}
                    <span class="font-normal">Siguiendo</span>

                </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">
                    {{ $user->posts->count() }}
                    <span class="font-normal">Post</span>

                </p>
                @auth
                    @if (!($user->id === auth()->user()->id))
                        @if ($user->checkFollowing(auth()->user()))
                            <form action="{{ route('users.unfollow', $user) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button
                                    class="flex gap-2 p-1 px-4 bg-red-800 hover:bg-red-700 rounded-md shadow-sm text-white text-sm border-red-300 border"
                                    type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>


                                    Dejar de seguir</button>
                            </form>
                        @else
                            <form action="{{ route('users.follow', $user) }}" method="POST">
                                @csrf

                                <button
                                    class="flex gap-2 p-1 px-4 bg-gray-200 hover:bg-gray-300 rounded-md shadow-sm text-gray-800 text-sm border-gray-300 border"
                                    type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>



                                    Seguir</button>
                            </form>
                        @endif
                    @endif
                @endauth

            </div>
        </div>
    </div>

    <section>
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>
        @if ($posts->count() > 0)
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl-grid-cols-4 gap-6">
                @foreach ($posts as $post)
                    <div>
                        <a href="{{ route('posts.show', ['user' => $user->username, 'post' => $post]) }}">
                            <img src="{{ asset('uploads' . '/' . $post->imagen) }}"
                                alt="Imagen del post {{ $post->titulo }}" />
                        </a>
                    </div>
                @endforeach

            </div>
            <div class="my-10">
                {{ $posts->links('pagination::tailwind') }}
            </div>
        @else
            <p class="text-gray-600 uppercase text-sm text-center">No hay publicaciones</p>
        @endif
    </section>
@endsection
