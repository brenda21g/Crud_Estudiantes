@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4 text-center">Agregar Carrera</h1>

    <form action="{{ route('careers.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block font-medium mb-1">Nombre de la carrera</label>
            <input type="text" name="name" class="w-full border rounded p-2 focus:outline-none focus:ring focus:ring-purple-300" value="{{ old('name') }}" required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-between">
            <a href="{{ route('careers.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Volver</a>
            <button type="submit" class="bg-purple-300 text-white px-4 py-2 rounded hover:bg-purple-700">Guardar</button>
        </div>
    </form>
</div>
@endsection
