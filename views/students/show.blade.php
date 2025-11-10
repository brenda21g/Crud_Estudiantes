@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold text-center mb-6 text-purple-300">Detalles del Estudiante</h1>

    <div class="space-y-3">
        <p><strong>ID:</strong> {{ $student->id }}</p>
        <p><strong>Nombre:</strong> {{ $student->name }}</p>
        <p><strong>Correo:</strong> {{ $student->email }}</p>
        <p><strong>Carrera:</strong> {{ $student->career->name }}</p>
        <p><strong>Semestre:</strong> {{ $student->semester }}</p>
        <p><strong>Fecha de Registro:</strong> {{ $student->created_at->format('d/m/Y') }}</p>
    </div>

    <div class="mt-6 flex justify-between">
        <a href="{{ route('students.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Volver</a>
        <a href="{{ route('students.edit', $student->id) }}" class="bg-lime-600 text-white px-4 py-2 rounded hover:bg-lime-700">Editar</a>
    </div>
</div>
@endsection
