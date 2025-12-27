<!doctype html>
<html lang="es">
    <head>
        <title>PetCat - Cuidado Profesional para tus Mascotas</title>
        <link rel="icon" href="icon/logo.png" type="image/png">

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="PetCat - Sistema integral de gestión veterinaria. Cuida de tus mascotas con tecnología de vanguardia.">
        
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        
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
                            'sacramento': ['Sacramento', 'cursive'],
                        }
                    }
                }
            }
        </script>
        
        <style>
            body {
                font-family: 'Poppins', sans-serif;
            }
            
            @keyframes float {
                0%, 100% { transform: translate(0, 0) rotate(0deg); }
                50% { transform: translate(-50px, 50px) rotate(180deg); }
            }
            
            .animate-float {
                animation: float 20s ease-in-out infinite;
            }
            
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            .animate-fadeInUp {
                animation: fadeInUp 1s ease;
            }
            
            .animate-fadeInUp-delay-1 {
                animation: fadeInUp 1s ease 0.2s backwards;
            }
            
            .animate-fadeInUp-delay-2 {
                animation: fadeInUp 1s ease 0.4s backwards;
            }
            
            @keyframes bounceIn {
                0% {
                    opacity: 0;
                    transform: scale(0.3) translateY(-50%);
                }
                50% {
                    transform: scale(1.05) translateY(-50%);
                }
                70% {
                    transform: scale(0.9) translateY(-50%);
                }
                100% {
                    opacity: 1;
                    transform: scale(1) translateY(-50%);
                }
            }
            
            .animate-bounceIn-left {
                animation: bounceIn 1.2s ease 0.5s backwards;
            }
            
            .animate-bounceIn-right {
                animation: bounceIn 1.2s ease 0.7s backwards;
            }

            .gradient-text {
                background: linear-gradient(135deg, #1572A1 0%, #19A974 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
            
            .signature {
                font-family: 'Sacramento', cursive;
            }
        </style>
    </head>
    <body class="overflow-x-hidden bg-white text-dark">
    
    <!-- Header & Navigation -->
    <header class="fixed top-0 w-full bg-white shadow-md z-50">
        <nav class="flex justify-between items-center px-[5%] py-4 max-w-[1400px] mx-auto">
            <div class="flex items-center gap-3">
                <img src="icon/logo.png" alt="PetCat Logo" class="h-12 object-cover">
                <span class="text-2xl font-bold gradient-text">🐾 PetCat</span>
            </div>
            
            <button class="md:hidden text-3xl text-dark" id="hamburger-menu" aria-label="Abrir menú">
                <span class="material-icons-sharp">menu</span>
            </button>
            
            <ul class="hidden md:flex list-none gap-8 m-0" id="nav-menu">
                <li><a href="#inicio" class="no-underline text-dark font-medium hover:text-secondary transition-colors">Inicio</a></li>
                <li><a href="#servicios" class="no-underline text-dark font-medium hover:text-secondary transition-colors">Servicios</a></li>
                <li><a href="#quienes-somos" class="no-underline text-dark font-medium hover:text-secondary transition-colors">¿Para quién es?</a></li>
                <li><a href="#contacto" class="no-underline text-dark font-medium hover:text-secondary transition-colors">Contacto</a></li>
            </ul>
            
            <div class="hidden md:flex gap-4">
                <a href="{{ route('login') }}" class="px-8 py-3 rounded-full font-semibold border-2 border-dark text-dark hover:bg-dark hover:text-white transition-all">Iniciar Sesión</a>
                <a href="{{ route('register') }}" class="px-8 py-3 rounded-full font-semibold bg-primary text-white hover:bg-[#0d4f73] hover:-translate-y-0.5 transition-all">Comenzar Gratis</a>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section id="inicio" class="min-h-screen flex items-center justify-center bg-gradient-to-br from-primary/5 to-secondary/5 relative pt-32 pb-16 px-[5%]">
        <div class="absolute -top-1/2 -right-1/2 w-full h-full bg-gradient-radial from-secondary/10 to-transparent animate-float pointer-events-none"></div>
        
        <!-- Gato a la izquierda - responsive y más grande -->
        <img src="icon/dog3d.png" alt="Gato" class="hidden md:block absolute left-[1%] top-1/2 -translate-y-1/2 w-40 h-40 md:w-48 md:h-48 lg:w-64 lg:h-64 xl:w-80 xl:h-80 2xl:w-96 2xl:h-96 object-contain animate-bounceIn-left z-10 hover:scale-110 transition-transform duration-300">
        
        <div class="max-w-5xl text-center relative z-10">
            <h1 class="text-5xl md:text-7xl font-extrabold leading-[1.3] mb-6 gradient-text animate-fadeInUp pb-2">
                🐾 El cuidado de tu mascota en un solo lugar
            </h1>
            <p class="text-xl md:text-xl text-dark mb-12 max-w-3xl mx-auto leading-relaxed animate-fadeInUp-delay-1">
                Plataforma integral de gestión veterinaria que conecta a dueños de mascotas con profesionales veterinarios.
                Historial médico digital, recordatorios automáticos y comunicación directa para el bienestar de tus peludos.
            </p>
            
            <div id="pet-greeting" class="text-base text-gray-600 my-3 italic opacity-90"></div>
            
            <div class="flex gap-6 justify-center flex-wrap animate-fadeInUp-delay-2">
                <a href="{{ route('register') }}" class="inline-flex items-center gap-2 px-10 py-4 text-lg font-semibold bg-accent-orange text-white rounded-full hover:bg-[#e65a2a] hover:-translate-y-1 transition-all">
                    <span class="material-icons-sharp">pets</span> Soy Dueño de Mascota
                </a>
                <a href="{{ route('register') }}" class="inline-flex items-center gap-2 px-10 py-4 text-lg font-semibold bg-accent-orange text-white rounded-full hover:bg-[#e65a2a] hover:-translate-y-1 transition-all">
                    <span class="material-icons-sharp">medical_services</span> Soy Veterinario
                </a>
            </div>
        </div>
        
        <!-- Perro a la derecha - responsive y más grande -->
        <img src="icon/cat3d.png" alt="Perro" class="hidden md:block absolute right-[1%] top-1/2 -translate-y-1/2 w-40 h-40 md:w-48 md:h-48 lg:w-64 lg:h-64 xl:w-80 xl:h-80 2xl:w-96 2xl:h-96 object-contain animate-bounceIn-right z-10 hover:scale-110 transition-transform duration-300">
    </section>

    <!-- Features Section -->
    <section id="servicios" class="py-24 px-[5%] bg-white">
        <h2 class="text-4xl md:text-5xl font-bold text-center mb-16 text-primary opacity-0 translate-y-8 transition-all duration-600" data-fade>
            💎 Características Premium para tus Mascotas
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 max-w-6xl mx-auto">
            <div class="bg-white p-12 rounded-3xl text-center transition-all duration-300 shadow-sm border border-black/5 hover:-translate-y-3 hover:shadow-xl hover:border-secondary opacity-0 translate-y-8" data-fade>
                <span class="material-icons-sharp text-6xl gradient-text mb-6 block">medical_information</span>
                <h3 class="text-2xl font-semibold mb-4 text-primary">Historial Clínico Digital</h3>
                <p class="text-gray-600 leading-relaxed">Acceso completo al historial médico de tu mascota: vacunas, cirugías, tratamientos y diagnósticos en un solo lugar seguro y accesible 24/7.</p>
            </div>
            <div class="bg-white p-12 rounded-3xl text-center transition-all duration-300 shadow-sm border border-black/5 hover:-translate-y-3 hover:shadow-xl hover:border-accent-yellow opacity-0 translate-y-8" data-fade>
                <span class="material-icons-sharp text-6xl text-accent-yellow mb-6 block">notifications_active</span>
                <h3 class="text-2xl font-semibold mb-4 text-primary">Recordatorios Inteligentes</h3>
                <p class="text-gray-600 leading-relaxed">Nunca olvides una vacuna, desparasitación o cita veterinaria. Recibe notificaciones automáticas personalizadas para cada mascota.</p>
            </div>
            <div class="bg-white p-12 rounded-3xl text-center transition-all duration-300 shadow-sm border border-black/5 hover:-translate-y-3 hover:shadow-xl hover:border-accent-orange opacity-0 translate-y-8" data-fade>
                <span class="material-icons-sharp text-6xl gradient-text mb-6 block">chat</span>
                <h3 class="text-2xl font-semibold mb-4 text-primary">Comunicación Directa</h3>
                <p class="text-gray-600 leading-relaxed">Canal de comunicación seguro entre veterinarios y dueños. Consultas rápidas, seguimiento de tratamientos y respuestas profesionales.</p>
            </div>
            <div class="bg-white p-12 rounded-3xl text-center transition-all duration-300 shadow-sm border border-black/5 hover:-translate-y-3 hover:shadow-xl hover:border-secondary opacity-0 translate-y-8" data-fade>
                <span class="material-icons-sharp text-6xl gradient-text mb-6 block">cloud_upload</span>
                <h3 class="text-2xl font-semibold mb-4 text-primary">Documentos en la Nube</h3>
                <p class="text-gray-600 leading-relaxed">Guarda y comparte radiografías, análisis de laboratorio y documentos importantes de forma segura con tu veterinario de confianza.</p>
            </div>
            <div class="bg-white p-12 rounded-3xl text-center transition-all duration-300 shadow-sm border border-black/5 hover:-translate-y-3 hover:shadow-xl hover:border-accent-orange opacity-0 translate-y-8" data-fade>
                <span class="material-icons-sharp text-6xl gradient-text mb-6 block">analytics</span>
                <h3 class="text-2xl font-semibold mb-4 text-primary">Seguimiento de Salud</h3>
                <p class="text-gray-600 leading-relaxed">Monitorea el peso, alimentación y medicamentos de tu mascota con gráficos y estadísticas claras para un mejor cuidado preventivo.</p>
            </div>
            <div class="bg-white p-12 rounded-3xl text-center transition-all duration-300 shadow-sm border border-black/5 hover:-translate-y-3 hover:shadow-xl hover:border-secondary opacity-0 translate-y-8" data-fade>
                <span class="material-icons-sharp text-6xl gradient-text mb-6 block">qr_code</span>
                <h3 class="text-2xl font-semibold mb-4 text-primary">Identificación Digital</h3>
                <p class="text-gray-600 leading-relaxed">Código QR único para cada mascota con acceso rápido a información de emergencia, contactos y datos médicos vitales.</p>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="quienes-somos" class="py-24 px-[5%] bg-light-gray">
        <h2 class="text-4xl md:text-5xl font-bold text-center mb-16 text-primary opacity-0 translate-y-8 transition-all duration-600" data-fade>
            🎯 ¿Para quién es PetCat?
        </h2>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 max-w-6xl mx-auto items-center">
            <div class="space-y-8 opacity-0 -translate-x-12 transition-all duration-600" data-slide-left>
                <div class="bg-white p-10 rounded-3xl shadow-md hover:scale-105 transition-transform duration-300">
                    <h3 class="text-3xl font-bold mb-4 text-secondary">🏠 Para Dueños de Mascotas</h3>
                    <p class="leading-relaxed text-gray-600 mb-4">
                        ¿Tienes uno o varios peludos en casa? PetCat te permite llevar un control completo de la salud de cada uno. 
                        Accede al historial médico completo, programa recordatorios para vacunas y medicamentos, y mantente en contacto 
                        directo con tu veterinario. Todo desde tu móvil o computadora, cuando lo necesites.
                    </p>
                    <ul class="list-none space-y-2 mt-4">
                        <li class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-secondary rounded-full"></span>
                            ✅ Perfil individual para cada mascota
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-secondary rounded-full"></span>
                            ✅ Recordatorios personalizados
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-secondary rounded-full"></span>
                            ✅ Acceso a historial médico completo
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-secondary rounded-full"></span>
                            ✅ Comunicación con tu veterinario
                        </li>
                    </ul>
                </div>
                <div class="bg-white p-10 rounded-3xl shadow-md hover:scale-105 transition-transform duration-300">
                    <h3 class="text-3xl font-bold mb-4 text-secondary">⚕️ Para Veterinarios Profesionales</h3>
                    <p class="leading-relaxed text-gray-600 mb-4">
                        Optimiza tu consulta y brinda un servicio de excelencia. Con PetCat puedes gestionar los expedientes de tus 
                        pacientes peludos de manera digital, programar citas, enviar recordatorios automáticos y mantener comunicación 
                        constante con los dueños. Dedica más tiempo a lo que importa: cuidar de las mascotas.
                    </p>
                    <ul class="list-none space-y-2 mt-4">
                        <li class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-secondary rounded-full"></span>
                            ✅ Gestión digital de expedientes
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-secondary rounded-full"></span>
                            ✅ Agenda de citas integrada
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-secondary rounded-full"></span>
                            ✅ Estadísticas de tu clínica
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-2 h-2 bg-secondary rounded-full"></span>
                            ✅ Comunicación eficiente con clientes
                        </li>
                    </ul>
                </div>
            </div>
            <div class="opacity-0 translate-x-12 transition-all duration-600" data-slide-right>
                <img src="icon/perrosGatos.jpeg" alt="Perros y Gatos Felices" loading="lazy" class="w-full rounded-3xl">
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonios" class="pb-20 px-[5%] bg-light-gray">
        <h2 class="text-4xl font-bold text-primary text-center mb-10 opacity-0 translate-y-8 transition-all duration-600" data-fade>
            Historias reales de familias con mascotas
        </h2>
        <div class="bg-white p-6 rounded-2xl border border-black/5 max-w-3xl mx-auto opacity-0 translate-y-8 transition-all duration-600" data-fade>
            <p class="italic text-gray-700 mb-4 leading-relaxed">
                "Desde que usamos PetCat, mi perra Luna nunca perdió una vacuna y mi veterinario tiene todo su historial. Me dio paz mental y ahora puedo enfocarme en disfrutar más tiempo con ella."
            </p>
            <div class="flex items-center gap-3 justify-center">
                <img src="icon/avatar1.jpg" alt="María" onerror="this.style.display='none'" class="w-12 h-12 rounded-full object-cover">
                <div>
                    <div class="font-bold">María Q. — Dueña de Luna</div>
                    <div class="signature text-2xl text-accent-orange text-center">— María</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contacto" class="py-24 px-[5%] bg-white">
        <h2 class="text-4xl md:text-5xl font-bold text-center mb-4 text-primary opacity-0 translate-y-8 transition-all duration-600" data-fade>
            📞 Contáctanos
        </h2>
        <p class="text-center text-xl text-gray-600 mb-12 opacity-0 translate-y-8 transition-all duration-600" data-fade>
            ¿Tienes preguntas? Estamos aquí para ayudarte a cuidar mejor de tus mascotas.
        </p>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 max-w-6xl mx-auto mt-8">
            <!-- Info Column -->
            <div class="bg-primary p-12 rounded-3xl text-white opacity-0 translate-y-8 transition-all duration-600" data-fade>
                <h4 class="text-2xl mb-6">📍 Información de Contacto</h4>
                
                <ul class="list-none space-y-4 mb-8">
                    <li class="flex items-center gap-4">
                        <span class="material-icons-sharp">phone</span>
                        <a href="tel:+593999999999" class="text-white no-underline hover:text-accent-yellow transition-colors">(+593) 999 999 999</a>
                    </li>
                    <li class="flex items-center gap-4">
                        <span class="material-icons-sharp">email</span>
                        <a href="mailto:info@petcat.com" class="text-white no-underline hover:text-accent-yellow transition-colors">info@petcat.com</a>
                    </li>
                    <li class="flex items-center gap-4">
                        <span class="material-icons-sharp">location_on</span>
                        <span>Avenida de las Américas, Quito, Ecuador</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <span class="material-icons-sharp">schedule</span>
                        <span>Lun - Vie: 8:00 AM - 6:00 PM</span>
                    </li>
                </ul>

                <h4 class="text-2xl mt-8 mb-4">🕐 Horario de Atención</h4>
                <ul class="list-none space-y-2">
                    <li class="py-2 border-b border-white/20"><strong>Lunes a Viernes:</strong> 8:00 AM - 6:00 PM</li>
                    <li class="py-2 border-b border-white/20"><strong>Sábados:</strong> 9:00 AM - 2:00 PM</li>
                    <li class="py-2 border-b border-white/20"><strong>Domingos:</strong> Cerrado</li>
                    <li class="py-2 border-b border-white/20"><strong>Emergencias:</strong> Disponible 24/7</li>
                </ul>
            </div>

            <!-- Form Column -->
            <div class="bg-white p-12 rounded-3xl shadow-sm opacity-0 translate-y-8 transition-all duration-600" data-fade>
                <h4 class="text-2xl mb-6 text-dark">✉️ Envíanos un Mensaje</h4>
                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="nombre" class="block mb-2 font-semibold text-dark">Nombre Completo</label>
                            <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required 
                                   class="w-full p-4 border-2 border-gray-300 rounded-xl focus:outline-none focus:border-primary transition-colors">
                        </div>
                        <div>
                            <label for="email" class="block mb-2 font-semibold text-dark">Correo Electrónico</label>
                            <input type="email" id="email" name="email" placeholder="tu@email.com" required 
                                   class="w-full p-4 border-2 border-gray-300 rounded-xl focus:outline-none focus:border-primary transition-colors">
                        </div>
                    </div>
                    <div>
                        <label for="asunto" class="block mb-2 font-semibold text-dark">Asunto</label>
                        <input type="text" id="asunto" name="asunto" placeholder="¿En qué podemos ayudarte?" required 
                               class="w-full p-4 border-2 border-gray-300 rounded-xl focus:outline-none focus:border-primary transition-colors">
                    </div>
                    <div>
                        <label for="mensaje" class="block mb-2 font-semibold text-dark">Mensaje</label>
                        <textarea id="mensaje" name="mensaje" rows="5" placeholder="Escribe tu mensaje aquí..." required 
                                  class="w-full p-4 border-2 border-gray-300 rounded-xl focus:outline-none focus:border-primary transition-colors"></textarea>
                    </div>
                    <button type="submit" class="inline-flex items-center gap-2 px-12 py-4 bg-accent-orange text-white font-semibold rounded-full hover:bg-[#e65a2a] hover:-translate-y-0.5 transition-all">
                        <span class="material-icons-sharp text-xl">send</span>
                        ENVIAR MENSAJE
                    </button>
                </form>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="bg-dark text-white py-12 px-[5%]">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
                <div class="text-center md:text-left">
                    <div class="flex items-center gap-3 justify-center md:justify-start">
                        <img src="icon/logo.png" alt="PetCat Logo" class="h-12 object-cover">
                        <span class="text-2xl font-bold text-white">🐾 PetCat</span>
                    </div>
                </div>

                <div class="text-center">
                    <p class="mb-0">&copy; 2025 PetCat. Todos los derechos reservados.</p>
                    <p class="text-sm opacity-80 mt-1">Cuidando a tus mascotas con tecnología 💙</p>
                </div>

                <div class="flex justify-center md:justify-end gap-4">
                    <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-secondary hover:-translate-y-1 transition-all" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-secondary hover:-translate-y-1 transition-all" aria-label="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-secondary hover:-translate-y-1 transition-all" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center text-white hover:bg-secondary hover:-translate-y-1 transition-all" aria-label="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- Menú Hamburguesa ---
            const hamburgerButton = document.getElementById('hamburger-menu');
            const navMenu = document.getElementById('nav-menu');

            if (hamburgerButton) {
                hamburgerButton.addEventListener('click', function() {
                    navMenu.classList.toggle('hidden');
                    const icon = this.querySelector('.material-icons-sharp');
                    icon.textContent = navMenu.classList.contains('hidden') ? 'menu' : 'close';
                });
            }

            // --- Animaciones al hacer scroll ---
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0) translateX(0)';
                    }
                });
            }, {
                threshold: 0.1
            });

            // Observar elementos con animación
            document.querySelectorAll('[data-fade], [data-slide-left], [data-slide-right]').forEach(el => {
                observer.observe(el);
            });

            // --- Saludo dinámico de mascotas ---
            const petGreetingEl = document.getElementById('pet-greeting');
            if (petGreetingEl) {
                const petNames = ['Luna','Max','Nala','Milo','Coco','Toby','Maggie','Simba'];
                const humanNames = ['Ana','Carlos','Sofía','Diego','Valentina','Luis','Camila','Javier'];
                const idx = Math.floor(Math.random() * petNames.length);
                const name = petNames[idx];
                petGreetingEl.textContent = `Hola — soy ${name}, el compañero peludo de ${humanNames[idx]}! ¿Quieres conocer cómo lo cuidamos?`;
                setTimeout(() => {
                    petGreetingEl.style.opacity = '1';
                }, 150);
            }
        });
    </script>
    </body>
</html>
