const formularioCotizacion = document.querySelector('#cotizacion');

eventListeners();

function eventListeners(){
    //Calcular los costos
    //formularioCotizacion.addEventListener('.calcular', calculo);

    //Cuando el formulario de cotizacion se ejecuta
    formularioCotizacion.addEventListener('submit', leerformulario);
}


function leerformulario(e){
    e.preventDefault();

    //Leer los datos de los inputs
    const costoFlete = document.querySelector('#costoFlete').value;
    const costoManiobras = document.querySelector('#costoManiobras').value;
    const costoSeguro = document.querySelector('#costoSeguro').value;
    const comentariosTM = document.querySelector('#comentariosTM').value;
    const accion = document.querySelector('#accion').value;
    let idSolicitud = document.querySelector('#idSolicitud').value;

    if(!/^([0-9])*$/.test(costoFlete) || !/^([0-9])*$/.test(costoManiobras) || !/^([0-9])*$/.test(costoSeguro)){
        mostrarNotificacion('Ingrese solo Números', 'error');
    }else if(costoFlete === '' || costoManiobras === '' || costoSeguro === '' || comentariosTM === ''){
            //2 parametros texto y clase
    
        mostrarNotificacion('Todos los campos son Obligatorios', 'error');
        console.log('Campo vacio');
        }else{
            const datosCotizacion = new FormData();
            datosCotizacion.append('idSolicitud', idSolicitud);
            datosCotizacion.append('costoFlete', costoFlete);
            datosCotizacion.append('costoManiobras', costoManiobras);
            datosCotizacion.append('costoSeguro', costoSeguro);
            datosCotizacion.append('comentariosTM', comentariosTM);
            datosCotizacion.append('accion', accion);

            //console.log(...datosCotizacion);

            if(accion === 'cotizar'){
                mostrarNotificacion('Datos Ingresados Correctamente', 'correcto');
                insertarBD(datosCotizacion);
                console.log('correcto')
            }
        }
}

function insertarBD(datos) {
    //llamado ajax

    //crear el objeto
    const xhr = new XMLHttpRequest();

    //abrir la conexion
    xhr.open('POST', '../modelos/modelo-cotizacion.php',true);

    //pasar los datos
    xhr.onload = function () {
        if(this.status === 200){
            console.log(JSON.parse( xhr.responseText) );

            const respuesta = JSON.parse( xhr.responseText);
            console.log(respuesta.idSolicitud);

            setTimeout(() => {
                window.location.replace(`../pdf/folio_cotizacion.php?id=${respuesta.datos.id_insert_cot}`)
            }, 3500);
            document.querySelector('form').reset();
        }
    }

    //enviar los datos
    xhr.send(datos);
}


//Notificacion en pantalla
function mostrarNotificacion(mensaje, clase) {
    const notificacion = document.createElement('DIV');
    notificacion.classList.add(clase, 'notificacion');
    notificacion.textContent = mensaje;

    //formulario
    formularioCotizacion.insertBefore(notificacion, document.querySelector('form fieldset'));

    //Ocultar la notificacion
    setTimeout(() =>{
        notificacion.classList.add('visible');
        setTimeout(() => {
            notificacion.classList.remove('visible');
            setTimeout(() => {
                notificacion.remove();
            }, 500);
        }, 3000);
    }, 100);
}


// function calculo(e) {
//     e.preventDefault();
//     let costoFlete = document.querySelector('#costoFlete').value;
//     let costoManiobras = document.querySelector('#costoManiobras').value;
//     let costoSeguro = document.querySelector('#costoSeguro').value;
//     let costoSeguro = document.querySelector('#costoSeguro').value;
//     let total = document.querySelector('.total');

//     let total = 0;
//     costoFlete = parseInt(costoFlete)
//     costoManiobras = parseInt(costoManiobras)
//     costoSeguro = parseInt(costoSeguro)
//     total = costoSeguro + costoFlete + costoManiobras;
//     console.log(total);

// }