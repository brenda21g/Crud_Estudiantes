@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4 text-center">Editar Estudiante</h1>

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="block font-medium mb-1">Nombre</label>
            <input type="text" name="name" value="{{ old('name', $student->name) }}" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-3">
            <label class="block font-medium mb-1">Correo</label>
            <input type="email" name="email" value="{{ old('email', $student->email) }}" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-3">
            <label class="block font-medium mb-1">Carrera</label>
            <select name="career_id" class="w-full border rounded p-2" required>
                @foreach($careers as $career)
                    <option value="{{ $career->id }}" {{ $career->id == $student->career_id ? 'selected' : '' }}>
                        {{ $career->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Semestre</label>
            <input type="number" name="semester" value="{{ old('semester', $student->semester) }}" min="1" max="12" class="w-full border rounded p-2" required>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('students.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Volver</a>
            <button type="submit" class="bg-lime-600 text-white px-4 py-2 rounded hover:bg-lime-700">Actualizar</button>
        </div>
    </form>
</div>
@endsection
