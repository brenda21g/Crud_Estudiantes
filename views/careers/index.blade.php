@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Lista de Carreras</h1>
        <a href="{{ route('careers.create') }}" class="bg-blue-300 text-white px-4 py-2 rounded hover:bg-blue-400">Nueva Carrera</a>
    </div>

    <table class="w-full bg-white rounded shadow">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="py-2 px-4">ID</th>
                <th class="py-2 px-4">Nombre</th>
                <th class="py-2 px-4 text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($careers as $career)
            <tr class="border-t hover:bg-gray-50">
                <td class="py-2 px-4">{{ $career->id }}</td>
                <td class="py-2 px-4">{{ $career->name }}</td>
                <td class="py-2 px-4 text-center space-x-2">
                    <a href="{{ route('careers.edit', $career->id) }}" class="bg-pink-400 text-white px-3 py-1 rounded hover:bg-pink-500">Editar</a>
                    <form action="{{ route('careers.delete', $career->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-800" onclick="return confirm('¿Eliminar carrera?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
