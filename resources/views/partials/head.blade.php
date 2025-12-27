<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>{{ $title ?? config('app.name') }}</title>

<link rel="icon" href="/favicon.ico" sizes="any">
<link rel="icon" href="/favicon.svg" type="image/svg+xml">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

@vite(['resources/css/app.css', 'resources/js/app.js'])
@fluxAppearance

<script>
    // Sincronizar data-theme de daisyUI con la clase .dark de Flux/Tailwind
    function syncTheme() {
        const html = document.documentElement;
        const body = document.body;
        const isDark = html.classList.contains('dark');
        const theme = isDark ? 'dark' : 'light';
        
        html.setAttribute('data-theme', theme);
        body.setAttribute('data-theme', theme);
    }
    
    // Ejecutar al cargar
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', syncTheme);
    } else {
        syncTheme();
    }
    
    // Observar cambios en la clase del html
    const observer = new MutationObserver((mutations) => {
        mutations.forEach((mutation) => {
            if (mutation.attributeName === 'class') {
                syncTheme();
            }
        });
    });
    
    observer.observe(document.documentElement, {
        attributes: true,
        attributeFilter: ['class']
    });
</script>
