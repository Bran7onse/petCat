@props([
    // numero de columnas dinamico
    'columncard' => 2,
])

<div class="grid grid-cols-1 md:grid-cols-{{ $columncard }} gap-4">
    {{ $slot }}
</div>