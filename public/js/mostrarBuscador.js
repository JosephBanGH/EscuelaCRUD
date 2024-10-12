




const buttonBuscar = document.getElementById('buscarAlumno');
const buttonCerrar = document.getElementById('cerrarPopup');
const popup = document.querySelector('.popup');
const overlay = document.createElement('div');
overlay.classList.add('popup-overlay');
document.body.appendChild(overlay);

// Mostrar el popup
buttonBuscar.addEventListener('click', function() {
    popup.style.display = 'block';
    overlay.style.display = 'block';
});

// Cerrar el popup
buttonCerrar.addEventListener('click', function() {
    popup.style.display = 'none';
    overlay.style.display = 'none';
});

// También permite cerrar al hacer clic fuera del popup (en la superposición)
overlay.addEventListener('click', function() {
    popup.style.display = 'none';
    overlay.style.display = 'none';
});



buttonBuscar.addEventListener('click', function() {
    popup.classList.add('show');
    overlay.style.display = 'block';
});

buttonCerrar.addEventListener('click', function() {
    popup.classList.remove('show');
    overlay.style.display = 'none';
});


