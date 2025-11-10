<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Estudiantes</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
    <nav class="bg-pink-600 text-white p-4 flex justify-between items-center shadow">
        <div class="font-bold text-lg">CRUD</div>
        <div class="space-x-4">
            <a href="{{ route('students.index') }}" class="hover:underline">Estudiantes</a>
            <a href="{{ route('careers.index') }}" class="hover:underline">Carreras</a>
        </div>
    </nav>

    <main class="p-6">
        @if (session('success'))
            <div class="bg-blue-500 text-white p-3 rounded mb-4 text-center font-semibold">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
