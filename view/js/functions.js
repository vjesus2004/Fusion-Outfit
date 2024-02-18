function volverPaginaAnterior() {
    history.back();
  }

function toggleIcon() {
    var iconElement = document.getElementById("toggleIcon");
    var currentState = iconElement.classList.contains("fa-toggle-on");
    var btnG = document.getElementById("btnG");
    var nProd = document.getElementById("nProd");
    var nPers = document.getElementById("nPers");

    if (currentState) {
        iconElement.classList.remove("fa-toggle-on");
        iconElement.classList.add("fa-toggle-off");

        
        if(btnG.name == "modificar"){
            btnG.name = "guardar";
            btnG.value = "Guardar";
            nProd.textContent = "Nuevo producto";
            nPers.textContent = "Nueva Persona";
        }
        
        

    } else {
        iconElement.classList.remove("fa-toggle-off");
        iconElement.classList.add("fa-toggle-on");
        
        if(btnG.name == "guardar"){
        btnG.value = "Modificar";
        btnG.name = "modificar";
        nProd.textContent = "Modificar producto";
        nPers.textContent = "Modificar persona";
        }
    }
}



function validarFormulario() {
        // Obtener los valores de los campos de entrada
        var nombre = document.getElementById('nom').value;
        var ape = document.getElementById('ape').value;
        var tel = document.getElementById('tel').value;
        var pass = document.getElementById('pass').value;
        var email = document.getElementById('email').value;
        var calle = document.getElementById('calle').value;
        var npuerta = document.getElementById('npuerta').value;
        var ci = document.getElementById('ci').value;

        // Verificar si los campos están en blanco
        if (nombre === '' || ape === ''|| tel === ''|| pass === ''|| email === ''|| calle === ''|| npuerta === ''|| ci === '') {
            alert('Por favor, completa todos los campos.');
            return false; // Evita que el formulario se envíe
        }

        // El formulario se enviará si todos los campos tienen valores
        return true;
    }

//Ventana eliminacion de formulario
  function openPopup() {
      var popupOverlay = document.getElementById("popupOverlay");
      popupOverlay.style.display = "flex";
  }

  function closePopup() {
      var popupOverlay = document.getElementById("popupOverlay");
      popupOverlay.style.display = "none";
  }

  //Mostrar divs consultas
  document.addEventListener('DOMContentLoaded', function() {
    const select = document.querySelector('select[name="consulta"]');
    const div1 = document.getElementById('div-1');
    const div2 = document.getElementById('div-2');
    const div3 = document.getElementById('div-3');
    const div4 = document.getElementById('div-4');
    const div5 = document.getElementById('div-5');
    const div6 = document.getElementById('div-6');
    const div7 = document.getElementById('div-7');
    const div8 = document.getElementById('div-8');
    const div9 = document.getElementById('div-9');
    const div10 = document.getElementById('div-10');
    const div11 = document.getElementById('div-11');
    const div12 = document.getElementById('div-12');
    const div13 = document.getElementById('div-13');
    const div14 = document.getElementById('div-14');
    const div15 = document.getElementById('div-15');
    const div16 = document.getElementById('div-16');

    // Ocultar todos los divs al cargar la página
    div1.style.display = 'none';
    div2.style.display = 'none';
    div3.style.display = 'none';
    div4.style.display = 'none';
    div5.style.display = 'none';
    div6.style.display = 'none';
    div7.style.display = 'none';
    div8.style.display = 'none';
    div9.style.display = 'none';
    div10.style.display = 'none';
    div11.style.display = 'none';
    div12.style.display = 'none';
    div13.style.display = 'none';
    div14.style.display = 'none';
    div15.style.display = 'none';
    div16.style.display = 'none';

    select.addEventListener('change', function() {
        const option = select.value;
        div1.style.display = 'none';
        div2.style.display = 'none';
        div3.style.display = 'none';
        div4.style.display = 'none';
        div5.style.display = 'none';
        div6.style.display = 'none';
        div7.style.display = 'none';
        div8.style.display = 'none';
        div9.style.display = 'none';
        div10.style.display = 'none';
        div11.style.display = 'none';
        div12.style.display = 'none';
        div13.style.display = 'none';
        div14.style.display = 'none';
        div15.style.display = 'none';
        div16.style.display = 'none';

        if (option === '1') {
            div1.style.display = 'block';
        } else if (option === '2') {
            div2.style.display = 'block';
        } else if (option === '3') {
            div3.style.display = 'block';
        }else if (option === '4') {
            div4.style.display = 'block';
        }else if (option === '5') {
            div5.style.display = 'block';
        }else if (option === '6') {
            div6.style.display = 'block';
        }else if (option === '7') {
            div7.style.display = 'block';
        }else if (option === '8') {
            div8.style.display = 'block';
        }else if (option === '9') {
            div9.style.display = 'block';
        }else if (option === '10') {
            div10.style.display = 'block';
        }else if (option === '11') {
            div11.style.display = 'block';
        }else if (option === '12') {
            div12.style.display = 'block';
        }else if (option === '13') {
            div13.style.display = 'block';
        }else if (option === '14') {
            div14.style.display = 'block';
        }else if (option === '15') {
            div15.style.display = 'block';
        }else if (option === '16') {
            div16.style.display = 'block';
        }
        // Agrega más condiciones para otras opciones...
    });
});