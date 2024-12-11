<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mariano Melgar</title>
    <link rel="stylesheet" href="{{ asset('css/carouselStyle.css') }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap');
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Nunito', sans-serif;
        }
        .carousel-container{
            position: relative;
            width: 70%;
            margin: auto;
            overflow: hidden;
            border: 2px solid #ddd;
            border-radius: 10px;
        }
        .carousel{
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .carousel-item{
            min-width: 100%;
            text-align: center;
            background-color: #fffcfc;
            padding: 20px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        /*Botones de control*/
        .carousel-control{
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            border: none;
            padding: 10px;
            cursor: pointer;
            z-index: 1;
        }

        .carousel-control.prev{
            left: 10px;
        }

        .carousel-control.next{
            right: 10px;
        }

        .imagenCarousel{
            width: 100%;
            object-fit: cover;
        }



        @media(max-width: 768px){
            .carousel-item{
                font-size: 14px;
            }
            .carousel-container{
                width: 90%;
            }
        }

        /* HEADER */
        .header{
            height: 85px;
            display: flex;
            position: sticky;
            background: rgb(30, 18, 86);
            justify-content: space-between;
            align-items: center;
            padding: 10px 10%;
        }

        .logo img{
            height: 65px;
            width: auto;
            transition: all 0.3s;
        }

        .logo img:hover{
            cursor: pointer;
            transform: scale(1.2);
            filter: drop-shadow(8px 8px 3px rgb(122, 221, 102)) drop-shadow(-8px -8px 4px rgb(92, 162, 235))
        }

        .nav-links{
            list-style: none;
        }
        .nav-links li{
            display: inline-block;
            padding: 0 20px;
            
        }
        .nav-links a{
            text-decoration: none;
            color: white;
            font-weight: 700;
            font-size: 700;
            transition: all 0.3s;
        }

        .nav-links a:hover{
            color: rgb(12, 210, 183);
        }

        .nav-links li:hover{
            transform: scale(1.1);
        }

        .btn button{
            padding: 10px;
            border-radius: 10px;
            border: none;
        }

        .btn button:hover{
            background: rgb(12, 210, 183);
            box-shadow: -1px -1px 6px 0 rgb(122, 221, 102), 4px 4px 16px 2px rgb(92, 162, 235);
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="{{ asset('img/logoColegio.png') }}" alt="">
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="#">Mision - Vision</a></li>
                <li><a href="#">Nosotros</a></li>
                <li><a href="#">Matriculas</a></li>
            </ul>
        </nav>
        <a href="{{ route('loginShow') }}" class="btn"><button>Login</button></a>
    </header>


    <div class="carousel-container">
        <div class="carousel">
            <div class="carousel-item">
                <img src="{{ asset('img/infraestructura.jpg') }}" class="imagenCarousel" alt="">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/fiestasPatrias.jpg') }}" class="imagenCarousel" alt="">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/festivalAprendizaje.jpg') }}" class="imagenCarousel" alt="">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/insigniaMariano.jpg') }}" class="imagenCarousel" alt="">
            </div>
        </div>
        <button class="carousel-control prev" id="prevButton"> « </button>
        <button class="carousel-control next" id="nextButton"> » </button>
    </div>
    
    <script src="{{ asset('js/carousel.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded',()=>{
            const contenedor = document.querySelector('.carousel-container')
            const carousel = document.querySelector('.carousel');
            const items = document.querySelectorAll('.carousel-item');
            const prevButton = document.getElementById('prevButton');
            const nextButton = document.getElementById('nextButton');
            let currentIndex = 0;
            let interval;

            function moveToNext(){
                currentIndex = (currentIndex+1) % items.length;
                updateCarousel();
            }

            function moveToPrev(){
                currentIndex = (currentIndex - 1 + items.length) % items.length;
                updateCarousel();
            }

            function updateCarousel(){
                const offset = -currentIndex * 100;
                carousel.style.transform = `translateX(${offset}%)`;
            }

            function startAutoSlide(){
                interval = setInterval(moveToNext, 3000);
            }

            function stopAutoSlide(){
                clearInterval(interval);
            }

            prevButton.addEventListener('click',moveToPrev)
            nextButton.addEventListener('click',moveToNext)

            contenedor.addEventListener('mouseover', stopAutoSlide);
            contenedor.addEventListener('mouseout',startAutoSlide);
            startAutoSlide()
        })
    </script>
</body>
</html>