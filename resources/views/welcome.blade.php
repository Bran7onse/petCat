<!doctype html>
<html lang="en">
    <head>
        <title>PetCare Control Web - La salud de tu mascota, siempre bajo control</title>
        <link rel="icon" href="icon/logo.png" type="image/png">

        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="{{asset('assets/login-style.css')}}" />
        <link rel="stylesheet" href="landing-style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    </head>
    <body class="menu-closed">
    <header class="header">
        <nav class="navbar">
            <div class="logo-container">
                <img src="icon/logo.png" alt="PetCare Logo" class="logo">
                <span>PetCare Control Web</span>
            </div>
            <button class="hamburger-menu" aria-label="Abrir menú de navegación">
                <span class="material-icons-sharp menu-icon">menu</span>
            </button>
            <ul class="nav-menu">
                <li><a href="#inicio">Inicio</a></li>
                <li><a href="#servicios">Servicios</a></li>
                <li><a href="#quienes-somos">¿Para quién es?</a></li>
                <li><a href="#contacto">Contacto</a></li>
            </ul>
            <div class="auth-buttons">
                <a href="{{ route('login') }}" class="btn btn-primary">Iniciar Sesión</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Registro</a>
            </div>
        </nav>
    </header>

    <section id="inicio" class="hero">
        <div class="hero-content">
            <h1 class="hero-title fade-in-up">La salud de tu mascota, siempre bajo control.</h1>
            <p class="hero-subtitle fade-in-up">
                La plataforma web que centraliza la información de salud de tus mascotas.
                Conectamos a dueños y veterinarios para una gestión moderna y organizada.
            </p>
            <div class="hero-cta-buttons fade-in-up">
                <a href="#" class="btn btn-primary-solid">
                    <span class="material-icons-sharp">pets</span> Soy Propietario
                </a>
                <a href="#" class="btn btn-secondary">
                    <span class="material-icons-sharp">health_and_safety</span> Soy Veterinario
                </a>
            </div>
        </div>
    </section>

    <section id="servicios" class="features">
        <h2 class="fade-in-up">Digitaliza y controla el bienestar de tu mascota</h2>
        <div class="features-grid">
            <div class="feature-card fade-in-up">
                <span class="material-icons-sharp icon">calendar_month</span>
                <h3>Historial Clínico Digital</h3>
                <p>Registra y almacena todas las vacunas, tratamientos y consultas.</p>
            </div>
            <div class="feature-card fade-in-up">
                <span class="material-icons-sharp icon">notifications_active</span>
                <h3>Recordatorios Automáticos</h3>
                <p>Recibe alertas para no olvidar nunca más una cita o vacuna.</p>
            </div>
            <div class="feature-card fade-in-up">
                <span class="material-icons-sharp icon">forum</span>
                <h3>Comunicación Directa</h3>
                <p>Un canal directo entre el veterinario y el dueño para un seguimiento claro.</p>
            </div>
        </div>
    </section>

    <section id="quienes-somos" class="about-us">
        <h2 class="fade-in-up">¿Para quién es?</h2>
        <div class="about-us-content">
            <div class="about-us-text slide-in-left">
                <div class="audience-block">
                    <h3>Propietarios de Mascotas</h3>
                    <p>Lleva un control detallado de la salud de tus mascotas, accede a su historial médico y recibe recordatorios importantes.</p>
                </div>
                <div class="audience-block">
                    <h3>Veterinarios</h3>
                    <p>Gestiona la información médica de tus pacientes, comunícate fácilmente con los dueños y mejora la calidad del cuidado que ofreces.</p>
                </div>
            </div>
            <div class="about-us-image slide-in-right">
                <img src="icon/perrosGatos.jpeg" alt="About Us">
            </div>
        </div>
    </section>

    <section id="contacto" class="contact-improved">
        <div class="container">
            <h2 class="fade-in-up">Contacto</h2>
            <p class="fade-in-up">Estamos aquí para ayudarte. ¡No dudes en ponerte en contacto con nosotros!</p>

            <div class="row g-5 mt-4">

                <div class="col-lg-6 col-md-12 contact-info-column fade-in-up">
                    <a href="#" class="btn btn-contact-book">Reservar cita en línea</a>

                    <ul class="contact-details-list">
                        <li>
                            <span class="material-icons-sharp icon">phone</span>
                            <a href="tel:+593999999999">(+593) 999 999 999</a> </li>
                        <li>
                            <span class="material-icons-sharp icon">email</span>
                            <a href="mailto:hola@petcare.com">hola@petcare.com</a> </li>
                        <li>
                            <span class="material-icons-sharp icon">location_on</span>
                            <span>Avenida Siempre Viva 123, Quito, Ecuador</span> </li>
                    </ul>

                    <h4>Horario de apertura:</h4>
                    <ul class="opening-hours-list">
                        <li>Lunes cerrado</li>
                        <li>Martes 10am - 9pm</li>
                        <li>Miércoles 10 a. m. - 5 p. m.</li>
                        <li>Jueves 10am - 9pm</li>
                        <li>Viernes 10 a. m. - 5 p. m.</li>
                        <li>Sábados solo con cita previa</li>
                        <li>Domingo cerrado</li>
                    </ul>
                </div>

                <div class="col-lg-6 col-md-12 contact-form-column fade-in-up">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group-line">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" id="nombre" name="nombre" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group-line">
                                    <label for="email">Correo electrónico</label>
                                    <input type="email" id="email" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                 <div class="form-group-line">
                                    <label for="mensaje">Mensaje</label>
                                    <textarea id="mensaje" name="mensaje" rows="4" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-contact-submit">ENVIAR</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
    <footer class="footer-main">
    <div class="footer-top">
        <div class="container">
            <div class="row align-items-center py-2">

                <div class="col-md-6">
                    <p class="footer-copyright">
                        &copy; 2023 PetCare Control Web. Todos los derechos reservados.
                    </p>
                </div>

                <div class="col-md-6 d-flex justify-content-md-end justify-content-center mt-2 mt-md-0">
                    <div class="footer-social-icons">
                        <a href="icon/facebook.png" class="social-icon facebook" aria-label="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="icon/gorjeo.png" class="social-icon twitter" aria-label="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="icon/linkedin.png" class="social-icon linkedin" aria-label="LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom-image">
        </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"
    ></script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"
    ></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // --- Lógica del Menú Hamburguesa ---
            const hamburgerButton = document.querySelector('.hamburger-menu');
            const navMenu = document.querySelector('.nav-menu');
            const body = document.body;

            hamburgerButton.addEventListener('click', function() {
                body.classList.toggle('menu-open');
                if (body.classList.contains('menu-open')) {
                    hamburgerButton.innerHTML = '<span class="material-icons-sharp close-icon">close</span>';
                } else {
                    hamburgerButton.innerHTML = '<span class="material-icons-sharp menu-icon">menu</span>';
                }
            });

            navMenu.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    if (body.classList.contains('menu-open')) {
                        body.classList.remove('menu-open');
                        hamburgerButton.innerHTML = '<span class="material-icons-sharp menu-icon">menu</span>';
                    }
                });
            });

            // --- Lógica de Animación al Hacer Scroll ---
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target); // Animar solo una vez
                    }
                });
            }, {
                threshold: 0.1 // Activar cuando el 10% del elemento sea visible
            });

            // Seleccionar todos los elementos que queremos animar
            const animatedElements = document.querySelectorAll('.fade-in-up, .slide-in-left, .slide-in-right');
            animatedElements.forEach(el => observer.observe(el));
        });
    </script>
    </body>
</html>
