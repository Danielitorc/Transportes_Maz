const formularioContactos = document.querySelector('#solicitud');

eventListeners();
deshabilitarFecha();

let asegurar = formularioContactos.asegurar;
let maniobras = formularioContactos.maniobras;
let ofertas = formularioContactos.ofertas;
const terminos = formularioContactos.terminos;

const mostrarCaja = document.querySelector('#asegurar');
const ocultarCaja = document.querySelector('#noAsegurar');
const siManiobras = document.querySelector('#maniobras');
const noManiobras = document.querySelector('#noManiobras');

let errors = document.querySelector('.errors');
let corrects = document.querySelector('.corrects');
let mostrar = document.querySelector('.mostrar')
let mostrarManiobras = document.querySelector('.mostrarManiobras');

mostrarCaja.addEventListener('input', validarAsegurar);
ocultarCaja.addEventListener('input', validarnoAsegurar);
siManiobras.addEventListener('input', validarManiobras);
noManiobras.addEventListener('input', validarnoManiobras);

function eventListeners(){
    //Cuando el formulario de crear se ejecuta
    formularioContactos.addEventListener('submit', leerFormulario);

}

function leerFormulario(e){
    e.preventDefault();

    //Leer los datos de los inputs
    const idSolicitud = document.querySelector('#idSolicitud').value;
    const nombre = document.querySelector('#nombre').value;
    const apellidos = document.querySelector('#apellidos').value;
    const telefono= document.querySelector('#telefono').value;
    const empresa = document.querySelector('#empresa').value;
    const correo = document.querySelector('#correo').value;
    const datosRec = document.querySelector('#datosRec').value;
    const fecha = document.querySelector('#fecha').value;
    const hora = document.querySelector('#hora').value;
    const unidad = document.querySelector('#unidad').value;
    const datosEnt = document.querySelector('#datosEnt').value;
    const adicionales = document.querySelector('#adicionales').value;
    const terminos = document.querySelector('#terminos');

    const valorMercancia = document.querySelector('#valorMercancia').value;
    const comentariosManiobras = document.querySelector('#comentariosManiobras').value;
    const accion= document.querySelector('#accion').value;


    //Agrego los errores al HTMLs
    errors.innerHTML = '';
    validarTerminos(e);

    if(!/^([0-9])*$/.test(telefono)){
        errors.style.display = 'block';
        errors.innerHTML += '<li>Ingrese solo numeros para el Teléfono</li>';
        setTimeout(() => {
            errors.style.display = 'none';
        }, 6000);
    }else if(telefono.length < 10){
        errors.style.display = 'block';
        errors.innerHTML += '<li>El telefono debe tener 10 digitos</li>';
        setTimeout(() => {
            errors.style.display = 'none';
        }, 6000);
    }else if(nombre === '' || apellidos === '' || empresa === '' || correo === '' || telefono === '' || datosEnt === '' || datosRec === '' || asegurar[0].checked === false && asegurar[1].checked === false || maniobras[0].checked === false && maniobras[1].checked === false || unidad === '' || adicionales === '' || fecha === '' || hora === '' || !terminos.checked ){
        //Si no se llenaron los campos, mostrara un error con indicaciones
        errors.style.display = 'block';
        errors.innerHTML += '<li>Todos los Campos son obligatorios</li>';
        setTimeout(() => {
            errors.style.display = 'none';
        }, 6000);

    }else{
        
        valorManiobras();
        seguro();

        validarOfertas(e);
        

        //Si pasa la valaidacion, crear llamado a ajax
        
        const infoContacto = new FormData();
        infoContacto.append('idSolicitud', idSolicitud);
        infoContacto.append('nombre', nombre.trim(nombre));
        infoContacto.append('apellidos', apellidos.trim());
        infoContacto.append('telefono', telefono.trim(apellidos));
        infoContacto.append('empresa', empresa.trim(empresa));
        infoContacto.append('correo', correo.trim(correo));
        infoContacto.append('datosRec', datosRec.trim(datosRec));
        infoContacto.append('unidad', unidad.trim(unidad));
        infoContacto.append('fecha', fecha.trim(fecha));
        infoContacto.append('hora', hora.trim(hora));
        infoContacto.append('datosEnt', datosEnt.trim(datosEnt));
        infoContacto.append('asegurar', asegurar.trim(asegurar));
        infoContacto.append('valorMercancia', valorMercancia.trim(valorMercancia));
        infoContacto.append('maniobras', maniobras.trim(maniobras));
        infoContacto.append('comentariosManiobras', comentariosManiobras.trim(comentariosManiobras));
        infoContacto.append('adicionales', adicionales.trim(adicionales));
        infoContacto.append('ofertas', ofertas);
        infoContacto.append('accion', accion.trim(accion));

        //console.log(...infoContacto);
            if(accion === 'actualizar'){
          
            corrects.style.display = 'block';
            corrects.innerHTML += '<li>Datos enviados Correctamente</li>';
            setTimeout(() => {
                corrects.style.display = 'none';
            }, 5000);
            //console.log(...infoContacto);
            actualizarBD(infoContacto);
        }
    }
}

function actualizarBD(datos){
    //llamado a ajax

    //crear el objeto
    const xhr = new XMLHttpRequest();

    //abrir la conexion
    xhr.open('POST','../../modelos/modeloActualizar.php', true);

    //Pasar los datos
    xhr.onload = function(){
        if(this.status === 200){
            const idS = idSolicitud.value;
            console.log(idS)
            //Leo la respuesta de PHP 
            const respuesta = JSON.parse ( xhr.responseText );

            console.log(respuesta);

            //Inserta un nuevo elemento a la tabla
           setTimeout(() => {
            window.location.replace(`../../pdf/solicitudActualizada.php?id=${idS}`)
           }, 3000);

            //document.querySelector('form').reset();

        }
    }
    //enviar los datos
    xhr.send(datos);
}



//Validar si el cliente desea recibir ofertas a su correo
function validarOfertas(){
    ofertas = document.querySelector('#ofertas').checked;
    if(ofertas === true){
        return true;
    }
}

//Establecer una fecha optima para poder realizar la cotizacion y vender un servicio de calidad
//Solo se permitira seleccionar una fecha de recoleccion 2 dias despues de la solicitud
function deshabilitarFecha(){
    const fechaInput = document.querySelector('#fecha');

    const fechaAhora = new Date();
    const year = fechaAhora.getFullYear();
    let mes = fechaAhora.getMonth() + 1;
    let dia = fechaAhora.getDate() + 2;
    
    if(mes < 10){
       mes= '0' + mes;
    }
    
    if(dia < 10){
        dia = '0' + dia;
    }

    if(dia > 30){
        mes = fechaAhora.getMonth() + 2;
        dia = '0' + (dia - 29);
    }

    const fechaDeshabilitar = `${year}-${mes}-${dia}`;
    fechaInput.min = fechaDeshabilitar;
    
}

//Se deben aceptar terminos y condiciones de los usos de los datos proporcionados
function validarTerminos(e){
    e.preventDefault();
    if(!terminos.checked){
        errors.style.display = 'block';
        errors.innerHTML += '<li>Acepte Términos y condiciones</li>';
        setTimeout(() => {
            errors.style.display = 'none';
        }, 4000);
    }
}

//Asigno el valor para determinar si el cliente requiere seguro en su cotizacion
function seguro(){
    asegurar = document.querySelector('#asegurar').checked;
    if(asegurar === true){
        asegurar = 'Asegurado';
    }else{
        asegurar = 'Sin seguro';
    }
}
//Si se selecciona que no require seguro para el traslado de su mercancia ocultara el campo para ingresar el valor de la  mercancia y calcular el costo
function validarnoAsegurar(e){
    e.preventDefault();
    if(asegurar[1].checked){
        mostrar.style.display = 'none';
    }
}

//Si se selecciona la opcion asegurar mostrara un campo donde se ingresara el valor de la mercancia y calcular el costo
function validarAsegurar(e){
    e.preventDefault();
    if(asegurar[0].checked){
        mostrar.style.display = 'block'; 
    }
}

//Asigno el valor del input radio para las maniobras
function valorManiobras(){
    maniobras = document.querySelector('#maniobras').checked;
    if(maniobras === true){
        maniobras = 'Requieridas';
    }else{
        maniobras = 'No Requieridas';
    }
}

//Si no se requieren maniobras para el servicio se oculta el campo donde se describen las maniobras requeridas
function validarManiobras(e){
    e.preventDefault();
    if(maniobras[0].checked === true){
        mostrarManiobras.style.display = 'block';
    }
}

//Si se requieren maniobras para el servicio mostrara el campo donde se describen las maniobras requeridas
function validarnoManiobras(e){
    e.preventDefault();
    if(maniobras[1].checked=== true){
        mostrarManiobras.style.display = 'none';
    }
}


