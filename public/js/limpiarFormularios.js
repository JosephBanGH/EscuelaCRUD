



document.querySelectorAll('form').forEach(function(form){
    form.addEventListener('submit',function(event){
        let inputs = form.querySelectorAll('input');
        inputs.forEach(function(input){
            input.value = input.value.trim(); // Eliminar espacios en blanco al inicio y al final
        });
    });
});


