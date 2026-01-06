{{-- Fonts + Icons (igual que Welcome) --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">

{{-- Tailwind CDN --}}
<script src="https://cdn.tailwindcss.com"></script>

{{-- Tailwind config: colores + fonts (igual que Welcome) --}}
<script>
  tailwind.config = {
    theme: {
      extend: {
        colors: {
          primary: "#1572A1",
          secondary: "#19A974",
          "accent-orange": "#FF6B35",
          "accent-yellow": "#FFD166",
          dark: "#2C3E50",
          "light-gray": "#F4F4F4",
        },
        fontFamily: {
          poppins: ["Poppins", "sans-serif"],
          sacramento: ["Sacramento", "cursive"],
        },
      },
    },
  };
</script>

{{-- Fuente global --}}
<style>
  html, body { font-family: 'Poppins', sans-serif; }
</style>
