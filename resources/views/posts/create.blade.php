@extends('/layouts/app')

@section('titulo')
    Nuevo post
@endsection

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            Imagen Aquí
        </div>
        <div class="md:w-1/2 p-10 mb-5 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
                        Título </label>
                    <input type="text" id="titulo" name="titulo" placeholder="Título de la publicación"
                        class="border p-3 w-full rounded-lg @error('titulo') border-red-500 @enderror"
                        value="{{ old('titulo') }}" />
                    @error('titulo')
                        <p class="bg-red-500 mt-5 text-white rounded-lg text-sm text-center p-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripción </label>
                    <textarea id="descripcion" name="descripcion" placeholder="Descripción de la publicación"
                        class="border p-3 w-full rounded-lg @error('descripcion') border-red-500 @enderror"></textarea>
                    @error('descripcion')
                        <p class="bg-red-500 mt-5 text-white rounded-lg text-sm text-center p-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <input type="submit" value="Crear publicación"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold p-3 text-white rounded-lg w-full" />
            </form>
        </div>
    </div>
@endsection
