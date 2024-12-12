<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>Colegio Mariano Melgar</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;700;900&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Nunito', sans-serif;
        }
        body {
            margin: 0;
            color: #333;
        }

        /* HEADER */
        header {
            background: rgb(30, 18, 86);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 5%;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .logo img {
            height: 65px;
            width: auto;
            transition: transform 0.3s, filter 0.3s;
        }

        .logo img:hover {
            cursor: pointer;
            transform: scale(1.1);
            filter: drop-shadow(8px 8px 3px rgb(122, 221, 102)) drop-shadow(-8px -8px 4px rgb(92, 162, 235));
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        nav a {
            text-decoration: none;
            color: white;
            font-weight: 700;
            transition: color 0.3s;
        }

        nav a:hover {
            color: rgb(12, 210, 183);
        }

        /*.btn button {
            padding: 10px 15px;
            border-radius: 10px;
            border: none;
            font-weight: 700;
            cursor: pointer;
            background: white;
            color: rgb(30, 18, 86);
            transition: all 0.3s;
        }

        .btn button:hover {
            background: rgb(12, 210, 183);
            color: #fff;
            box-shadow: -1px -1px 6px 0 rgb(122, 221, 102), 4px 4px 16px 2px rgb(92, 162, 235);
        }*/

        .btn-login {
            display: inline-block;
            position: relative;
            overflow: hidden; 
            padding: 10px 20px;
            border-radius: 10px;
            background: linear-gradient(135deg, rgb(12, 210, 183), rgb(5, 170, 150));
            color: #fff;
            font-weight: 700;
            text-decoration: none;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
          }
          
          .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0px 5px 15px rgba(5,170,150,0.3);
          }
          
          .btn-login:active {
            transform: translateY(0);
            box-shadow: none;
          }
          
          /* Efecto Ripple */
          .btn-login::before {
            content: "";
            position: absolute;
            width: 100px;
            height: 100px;
            background: rgba(255,255,255,0.4);
            display: block;
            border-radius: 50%;
            transform: scale(0);
            opacity: 0;
            pointer-events: none;
          }
          
          .btn-login:active::before {
            animation: ripple 0.6s ease-out;
          }
          
          @keyframes ripple {
            0% {
              transform: scale(0);
              opacity: 0.7;
            }
            80% {
              transform: scale(2.5);
              opacity: 0;
            }
            100% {
              opacity: 0;
              transform: scale(2.5);
            }
          }
          

        /* HERO SECTION */
        .hero {
            background: linear-gradient(to top, rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('{{ asset('img/infraestructura.jpg') }}') center/cover no-repeat;
            color: #fff;
            text-align: center;
            padding: 150px 20px;
        }
        
        .hero h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            font-weight: 900;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 40px;
        }

        .hero .cta {
            background: rgb(12, 210, 183);
            padding: 15px 30px;
            border-radius: 5px;
            text-decoration: none;
            color: #fff;
            font-weight: 700;
            transition: background 0.3s;
        }

        .hero .cta:hover {
            background: rgb(5, 170, 150);
        }

        /* SECTION TITLES */
        .section-title {
            text-align: center;
            font-size: 2.2rem;
            margin-bottom: 30px;
            font-weight: 900;
            color: rgb(30, 18, 86);
        }

        /* CARRUSEL */
        .carousel-section {
            padding: 50px 10%;
        }

        .carousel-container {
            position: relative;
            width: 100%;
            margin: auto;
            overflow: hidden;
            border-radius: 10px;
        }

        .carousel {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .carousel-item {
            min-width: 100%;
            background-color: #fffcfc;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .imagenCarousel {
            width: 100%;
            object-fit: cover;
            display: block;
        }

        .carousel-control {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0,0,0,0.7);
            color: #fff;
            border: none;
            padding: 10px;
            cursor: pointer;
            z-index: 1;
            font-size: 1.5rem;
            transition: background 0.3s;
        }

        .carousel-control:hover {
            background: rgba(0,0,0,0.9);
        }

        .carousel-control.prev {
            left: 10px;
        }

        .carousel-control.next {
            right: 10px;
        }

        /* INFO SECTIONS */
        .info-section {
            padding: 50px 10%;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        }

        .info-block {
            background: #f7f7f7;
            border-radius: 10px;
            padding: 30px;
        }

        .info-block h3 {
            margin-bottom: 20px;
            font-size: 1.5rem;
            color: rgb(30, 18, 86);
        }

        .info-block p {
            line-height: 1.6;
        }

        /* NOTICIAS Y EVENTOS */
        .noticias-section {
            padding: 50px 10%;
            background: #fafafa;
        }

        .noticias-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 30px;
        }

        .noticia {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 2px 10px rgba(0,0,0,0.1);
        }

        .noticia img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .noticia h4 {
            margin: 20px;
            font-size: 1.2rem;
            color: rgb(30, 18, 86);
        }

        .noticia p {
            margin: 0 20px 20px;
            font-size: 0.95rem;
        }

        /* OFERTA EDUCATIVA */
        .oferta-section {
            padding: 50px 10%;
        }

        .oferta-list {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            justify-content: center;
        }

        .oferta-item {
            background: #f7f7f7;
            border-radius: 10px;
            padding: 20px;
            width: 250px;
            text-align: center;
        }

        .oferta-item h3 {
            margin-bottom: 15px;
            color: rgb(30, 18, 86);
            font-size: 1.3rem;
        }

        /* ACTIVIDADES EXTRACURRICULARES */
        .actividades-section {
            padding: 50px 10%;
            background: #f4f4f4;
        }

        .actividades-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 30px;
        }

        .actividad {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0px 2px 10px rgba(0,0,0,0.1);
        }

        .actividad h4 {
            margin-bottom: 10px;
            color: rgb(30, 18, 86);
        }

        /* TESTIMONIOS */
        .testimonios-section {
            padding: 50px 10%;
        }

        .testimonios-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        }

        .testimonio {
            background: #f7f7f7;
            border-radius: 10px;
            padding: 30px;
        }

        .testimonio p {
            font-style: italic;
            margin-bottom: 20px;
        }

        .testimonio .autor {
            font-weight: 700;
            color: rgb(30, 18, 86);
        }

        /* LOGROS */
        .logros-section {
            padding: 50px 10%;
            background: #fafafa;
            text-align: center;
        }

        .logros-stats {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
        }

        .logro {
            background: #fff;
            border-radius: 10px;
            width: 200px;
            padding: 30px;
            box-shadow: 0px 2px 10px rgba(0,0,0,0.1);
        }

        .logro h3 {
            font-size: 2rem;
            margin-bottom: 10px;
            color: rgb(30, 18, 86);
        }

        .logro p {
            font-weight: 700;
        }

        /* RESPONSIVE AJUSTES */
        @media (max-width: 992px) {
            .noticias-grid {
                grid-template-columns: 1fr 1fr;
            }
            .actividades-grid {
                grid-template-columns: 1fr 1fr;
            }
            .testimonios-grid {
                grid-template-columns: 1fr;
            }
            .info-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .oferta-list {
                flex-direction: column;
                align-items: center;
            }
            .hero h1 {
                font-size: 2rem;
            }
            .hero p {
                font-size: 1rem;
            }
        }

        /* FOOTER */
        footer {
            background: rgb(30, 18, 86);
            color: #fff;
            padding: 40px 10%;
            display: flex;
            flex-wrap: wrap;
            gap: 50px;
            justify-content: space-between;
        }

        .footer-col {
            flex: 1;
            min-width: 200px;
        }

        .footer-col h4 {
            font-weight: 700;
            margin-bottom: 20px;
        }

        .footer-col p, .footer-col a, .footer-col label {
            font-size: 0.9rem;
            line-height: 1.5;
            color: #fff;
            text-decoration: none;
        }

        .footer-col a:hover {
            text-decoration: underline;
        }

        .social-icons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .social-icons a {
            display: inline-block;
            width: 35px;
            height: 35px;
            background: rgb(12, 210, 183);
            border-radius: 50%;
            color: #fff;
            text-align: center;
            line-height: 35px;
            font-weight: 700;
            transition: background 0.3s;
        }

        .social-icons a:hover {
            background: rgb(5, 170, 150);
        }

        .footer-form input, .footer-form textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: none;
        }

        .footer-form button {
            padding: 10px 15px;
            border-radius: 5px;
            border: none;
            background: rgb(12, 210, 183);
            color: #fff;
            font-weight: 700;
            cursor: pointer;
        }

        .footer-form button:hover {
            background: rgb(5, 170, 150);
        }

        @media (max-width: 768px) {
            footer {
                flex-direction: column;
                gap: 30px;
            }
        }

    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="{{ asset('img/logoColegio.png') }}" alt="Logo del Colegio Mariano Melgar">
        </div>
        <nav>
            <ul>
                <li><a href="#misionvision">Visión</a></li>
                <li><a href="#nosotros">Nosotros</a></li>
                <li><a href="#matriculas">Matrículas</a></li>
                <li><a href="#noticias">Noticias</a></li>
            </ul>
        </nav>
        <a href="{{ route('loginShow') }}" class="btn-login">Login</a>
    </header>

    <section class="hero">
        <h1>Colegio Mariano Melgar</h1>
        <p>Formando líderes con calidad humana, excelencia académica y compromiso social.</p>
        <a href="#matriculas" class="cta">¡Conoce nuestro proceso de matrícula!</a>
    </section>

    <section class="carousel-section">
        <h2 class="section-title">Nuestra Comunidad en Acción</h2>
        <div class="carousel-container">
            <div class="carousel">
                <div class="carousel-item">
                    <img src="{{ asset('img/infraestructura.jpg') }}" class="imagenCarousel" alt="Infraestructura del Colegio">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/fiestasPatrias.jpg') }}" class="imagenCarousel" alt="Celebración de Fiestas Patrias">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/festivalAprendizaje.jpg') }}" class="imagenCarousel" alt="Festival de Aprendizaje">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/insigniaMariano.jpg') }}" class="imagenCarousel" alt="Insignia del Colegio Mariano Melgar">
                </div>
            </div>
            <button class="carousel-control prev" id="prevButton">«</button>
            <button class="carousel-control next" id="nextButton">»</button>
        </div>
    </section>

    <section class="info-section" id="misionvision">
        <h2 class="section-title">Misión y Visión</h2>
        <div class="info-grid">
            <div class="info-block">
                <h3>Misión</h3>
                <p>Nuestra misión es brindar una educación integral de alta calidad que forme estudiantes con sólidos valores éticos, preparados para enfrentar los retos del mundo actual y convertirlos en ciudadanos comprometidos con su entorno.</p>
            </div>
            <div class="info-block">
                <h3>Visión</h3>
                <p>Nuestra visión es ser reconocidos como una institución educativa líder, innovadora y referente en la formación académica y humana, fomentando la creatividad, el pensamiento crítico y el espíritu emprendedor en cada uno de nuestros alumnos.</p>
            </div>
        </div>
    </section>

    <section class="info-section" id="nosotros">
        <h2 class="section-title">Nosotros</h2>
        <div class="info-grid">
            <div class="info-block">
                <h3>Nuestra Historia</h3>
                <p>El Colegio Mariano Melgar cuenta con décadas de trayectoria, fundada por educadores apasionados que vieron la necesidad de una educación integral en la comunidad. A lo largo de los años, hemos crecido e innovado, manteniendo la excelencia académica y la calidez humana que nos caracteriza.</p>
            </div>
            <div class="info-block">
                <h3>Nuestro Equipo</h3>
                <p>Contamos con un equipo docente altamente capacitado, en constante actualización y comprometido con el desarrollo integral de cada alumno. Nuestro personal administrativo y de apoyo trabaja en conjunto para brindar una experiencia educativa óptima y acogedora.</p>
            </div>
        </div>
    </section>

    <section class="info-section" id="matriculas">
        <h2 class="section-title">Matrículas</h2>
        <div class="info-grid">
            <div class="info-block">
                <h3>Proceso de Matrícula</h3>
                <p>Para conocer nuestro proceso de matrícula, fechas de inscripción y documentos requeridos, puedes ponerte en contacto con nuestra oficina de admisión. Nuestro objetivo es brindarte una atención personalizada para que tu hijo(a) pueda unirse a nuestra comunidad educativa con facilidad.</p>
            </div>
            <div class="info-block">
                <h3>Consultas y Apoyo</h3>
                <p>Si tienes dudas o necesitas apoyo durante el proceso, nuestro equipo estará disponible para ayudarte. Queremos que la experiencia de unirte a nuestro colegio sea positiva, clara y sin contratiempos.</p>
            </div>
        </div>
    </section>

    <section class="noticias-section" id="noticias">
        <h2 class="section-title">Noticias y Eventos</h2>
        <div class="noticias-grid">
            <div class="noticia">
                <img src="{{ asset('img/FeriaLibro.webp') }}" alt="Noticia 1">
                <h4>Feria del Libro</h4>
                <p>Alumnos de todos los grados participaron en la Feria del Libro Escolar, fomentando la lectura y el intercambio cultural.</p>
            </div>
            <div class="noticia">
                <img src="{{ asset('img/concurso.jpg') }}" alt="Noticia 2">
                <h4>Concurso de Matemática</h4>
                <p>Nuestros estudiantes destacaron en el Concurso Regional de Matemáticas, obteniendo medallas y reconocimientos.</p>
            </div>
            <div class="noticia">
                <img src="{{ asset('img/deporte.jpg') }}" alt="Noticia 3">
                <h4>Jornada Deportiva</h4>
                <p>La semana deportiva reforzó el trabajo en equipo, la sana competencia y el bienestar físico de nuestra comunidad.</p>
            </div>
        </div>
    </section>

    <section class="oferta-section" id="oferta">
        <h2 class="section-title">Nuestra Oferta Educativa</h2>
        <div class="oferta-list">
            <div class="oferta-item">
                <h3>Inicial</h3>
                <p>Desarrollo integral del niño mediante el juego, la creatividad y la exploración.</p>
            </div>
            <div class="oferta-item">
                <h3>Primaria</h3>
                <p>Formación sólida en competencias básicas, fomentando la curiosidad y el pensamiento crítico.</p>
            </div>
            <div class="oferta-item">
                <h3>Secundaria</h3>
                <p>Educación orientada a la preparación para la universidad y la vida profesional, con énfasis en valores y liderazgo.</p>
            </div>
        </div>
    </section>

    <section class="actividades-section" id="actividades">
        <h2 class="section-title">Actividades Extracurriculares</h2>
        <div class="actividades-grid">
            <div class="actividad">
                <h4>Club de Ciencias</h4>
                <p>Experimenta, investiga y descubre el fascinante mundo de la ciencia.</p>
            </div>
            <div class="actividad">
                <h4>Deportes</h4>
                <p>Fútbol, Vóley, Atletismo y más, promoviendo un estilo de vida saludable.</p>
            </div>
            <div class="actividad">
                <h4>Artes</h4>
                <p>Desarrolla tu talento artístico en música, danza, teatro y artes plásticas.</p>
            </div>
        </div>
    </section>

    <section class="testimonios-section">
        <h2 class="section-title">Testimonios</h2>
        <div class="testimonios-grid">
            <div class="testimonio">
                <p>"Mi hijo ha crecido académica y emocionalmente. El colegio siempre está atento a las necesidades de los estudiantes y las familias."</p>
                <p class="autor">- María, madre de familia</p>
            </div>
            <div class="testimonio">
                <p>"Gracias al Colegio Mariano Melgar ingresé a la universidad bien preparado. Aprendí a estudiar, a pensar de forma crítica y a comprometerme con mi comunidad."</p>
                <p class="autor">- Carlos, ex-alumno</p>
            </div>
        </div>
    </section>

    <section class="logros-section">
        <h2 class="section-title">Nuestros Logros</h2>
        <div class="logros-stats">
            <div class="logro">
                <h3>95%</h3>
                <p>Egresados ingresan a la universidad</p>
            </div>
            <div class="logro">
                <h3>+50</h3>
                <p>Premios académicos y deportivos</p>
            </div>
            <div class="logro">
                <h3>3</h3>
                <p>Décadas formando líderes</p>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer-col">
            <h4>Colegio Mariano Melgar</h4>
            <p>Dirección: Av. Los Próceres 123, Lima, Perú</p>
            <p>Teléfono: (01) 555-1234</p>
            <p>Email: info@colegiomariano.edu.pe</p>
            <div class="social-icons">
                <a href="#" aria-label="Facebook">F</a>
                <a href="#" aria-label="Twitter">T</a>
                <a href="#" aria-label="Instagram">I</a>
            </div>
        </div>
        <div class="footer-col">
            <h4>Enlaces Rápidos</h4>
            <p><a href="#misionvision">Misión - Visión</a></p>
            <p><a href="#nosotros">Nosotros</a></p>
            <p><a href="#matriculas">Matrículas</a></p>
            <p><a href="#noticias">Noticias</a></p>
            <p><a href="#oferta">Oferta Educativa</a></p>
            <p><a href="#actividades">Actividades Extracurriculares</a></p>
            <p><a href="{{ route('loginShow') }}">Login</a></p>
        </div>
        <div class="footer-col footer-form">
            <h4>Contáctanos</h4>
            <form action="#" method="post">
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" placeholder="Tu nombre" required>
                
                <label for="email">Correo</label>
                <input type="email" id="email" name="email" placeholder="Tu correo" required>

                <label for="message">Mensaje</label>
                <textarea id="message" name="message" rows="3" placeholder="Tu mensaje..." required></textarea>

                <button type="submit">Enviar</button>
            </form>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const contenedor = document.querySelector('.carousel-container');
            const carousel = document.querySelector('.carousel');
            const items = document.querySelectorAll('.carousel-item');
            const prevButton = document.getElementById('prevButton');
            const nextButton = document.getElementById('nextButton');
            let currentIndex = 0;
            let interval;

            function moveToNext() {
                currentIndex = (currentIndex + 1) % items.length;
                updateCarousel();
            }

            function moveToPrev() {
                currentIndex = (currentIndex - 1 + items.length) % items.length;
                updateCarousel();
            }

            function updateCarousel() {
                const offset = -currentIndex * 100;
                carousel.style.transform = `translateX(${offset}%)`;
            }

            function startAutoSlide() {
                interval = setInterval(moveToNext, 3000);
            }

            function stopAutoSlide() {
                clearInterval(interval);
            }

            const btnLogin = document.querySelector('.btn-login');
            btnLogin.addEventListener('click', (e) => {
                const x = e.clientX - e.target.offsetLeft;
                const y = e.clientY - e.target.offsetTop;
                btnLogin.style.setProperty('--ripple-x', `${x}px`);
                btnLogin.style.setProperty('--ripple-y', `${y}px`);
            });

            prevButton.addEventListener('click', moveToPrev);
            nextButton.addEventListener('click', moveToNext);

            contenedor.addEventListener('mouseover', stopAutoSlide);
            contenedor.addEventListener('mouseout', startAutoSlide);

            startAutoSlide();
        });
    </script>
</body>
</html>
