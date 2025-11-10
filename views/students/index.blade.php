@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Lista de Estudiantes</h1>
        <a href="{{ route('students.create') }}" class="bg-green-400 text-white px-4 py-2 rounded hover:bg-green-700">Nuevo Estudiante</a>
    </div>

    <table class="w-full bg-white rounded shadow">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="py-2 px-4">ID</th>
                <th class="py-2 px-4">Nombre</th>
                <th class="py-2 px-4">Correo</th>
                <th class="py-2 px-4">Carrera</th>
                <th class="py-2 px-4">Semestre</th>
                <th class="py-2 px-4 text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr class="border-t hover:bg-gray-50">
                <td class="py-2 px-4">{{ $student->id }}</td>
                <td class="py-2 px-4">{{ $student->name }}</td>
                <td class="py-2 px-4">{{ $student->email }}</td>
                <td class="py-2 px-4">{{ $student->career->name }}</td>
                <td class="py-2 px-4">{{ $student->semester }}</td>
                <td class="py-2 px-4 text-center space-x-2">
                    <a href="{{ route('students.show', $student->id) }}" class="bg-lime-500 text-white px-3 py-1 rounded hover:bg-lime-600">Ver</a>
                    <a href="{{ route('students.edit', $student->id) }}" class="bg-pink-400 text-white px-3 py-1 rounded hover:bg-pink-700">Editar</a>
                    <form action="{{ route('students.delete', $student->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('¿Eliminar estudiante?')" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
