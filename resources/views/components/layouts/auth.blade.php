{{-- resources/views/components/layouts/auth.blade.php --}}
@php
$title = $title ?? 'PetCare';
@endphp

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>{{ $title }}</title>

    <link rel="icon" href="{{ asset('icon/logo.png') }}" type="image/png">

    {{-- Tailwind CDN (como tu welcome) --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Iconos + Tipografía (como tu welcome) --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Config Tailwind (MISMA paleta que el welcome) --}}
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#1572A1',
                        'secondary': '#19A974',
                        'accent-orange': '#FF6B35',
                        'accent-yellow': '#FFD166',
                        'dark': '#2C3E50',
                        'light-gray': '#F4F4F4',
                    },
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .gradient-text {
            background: linear-gradient(135deg, #1572A1 0%, #19A974 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>

<body class="min-h-screen overflow-x-hidden bg-gradient-to-br from-primary/5 to-secondary/5 text-dark">
    {{ $slot }}
</body>

</html>