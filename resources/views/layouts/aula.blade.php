<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniLearning - Aula Virtual</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <script src="https://cdn.tailwindcss.com"></script>
    
    
    @stack('styles')
</head>
<body class="bg-[#14141e] m-0 p-0 overflow-x-hidden">
    
    @yield('content')

    @stack('scripts')
</body>
</html>