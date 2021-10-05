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
    //Cuando el formulario de crear o editar se ejecuta
    formularioContactos.addEventListener('submit', leerFormulario);

    //Listener para elminar el boton


    // listadoContactos.addEventListener('click', eliminarContacto);
}

function leerFormulario(e){
    e.preventDefault();

    //Leer los datos de los inputs
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

    errors.innerHTML = '';
    validarTerminos(e);
    
    

    if(nombre === '' || apellidos === '' || empresa === '' || correo === '' || telefono === '' || datosEnt === '' || datosRec === '' || asegurar[0].checked === false && asegurar[1].checked === false || maniobras[0].checked === false && maniobras[1].checked === false || unidad === '' || adicionales === '' || fecha === '' || hora === '' || !terminos.checked){
        //Dos parametros (texto, clase)
        errors.style.display = 'block';
        errors.innerHTML += '<li>Todos los Campos son obligatorios</li>';
        setTimeout(() => {
            errors.style.display = 'none';
        }, 4000);

        // mostrarNotificacion('Contacto Creado Correctamente', 'exito');
    }else{
        valorManiobras();
        seguro();

        validarOfertas(e);
        

        //Pasa la valaidacion, crear llamado a ajax
        
        const infoContacto = new FormData();
        infoContacto.append('nombre', nombre);
        infoContacto.append('apellidos', apellidos);
        infoContacto.append('telefono', telefono);
        infoContacto.append('empresa', empresa);
        infoContacto.append('correo', correo);
        infoContacto.append('datosRec', datosRec);
        infoContacto.append('unidad', unidad);
        infoContacto.append('fecha', fecha);
        infoContacto.append('hora', hora);
        infoContacto.append('datosEnt', datosEnt);
        infoContacto.append('asegurar', asegurar);
        infoContacto.append('valorMercancia', valorMercancia);
        infoContacto.append('maniobras', maniobras);
        infoContacto.append('comentariosManiobras', comentariosManiobras);
        infoContacto.append('adicionales', adicionales);
        infoContacto.append('ofertas', ofertas);
        infoContacto.append('accion', accion);

        //console.log(...infoContacto);

        if(accion === 'crear'){
            corrects.style.display = 'block';
            corrects.innerHTML += '<li>Datos enviados Correctamente</li>';
            setTimeout(() => {
                corrects.style.display = 'none';
            }, 5000);
            //Se crea un nueva solicitud
            insertarBD(infoContacto);

        }else{
            //Editar el contacto
        }
       
    }
}

function insertarBD(datos){
    //llamado a ajax

    //crear el objeto
    const xhr = new XMLHttpRequest();

    //abrir la conexion
    xhr.open('POST','modelos/modelo-contacto.php', true);

    //Pasar los datos
    xhr.onload = function(){
        if(this.status === 200){
            
            //Leo la respuesta de PHP 
            const respuesta = JSON.parse ( xhr.responseText );

            //Inserta un nuevo elemento a la tabla
            setTimeout(() => {
                location.assign(`../paginaWeb/pdf/solicitud.php?id=${respuesta.datos.id_insertado}`)
            }, 3000);

           //document.querySelector('form').reset();

        }
    }
    //enviar los datos
    xhr.send(datos);
}

function validarOfertas(){
    ofertas = document.querySelector('#ofertas').checked;
    if(ofertas === true){
        return true;
    }
}

function valorManiobras(){
    maniobras = document.querySelector('#maniobras').checked;
    if(maniobras === true){
        maniobras = 'Requieridas';
    }else{
        maniobras = 'No Requieridas';
    }
}

function seguro(){
    
    asegurar = document.querySelector('#asegurar').checked;
    if(asegurar === true){
        asegurar = 'Asegurado';
    }else{
        asegurar = 'Sin seguro';
    }
}

function validarAsegurar(e){
    e.preventDefault();
    if(asegurar[0].checked){
        mostrar.style.display = 'block'; 
    }


}

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

function validarnoAsegurar(e){
    e.preventDefault();
    if(asegurar[1].checked){
        mostrar.style.display = 'none';
    }
}

function validarManiobras(e){
    e.preventDefault();
    if(maniobras[0].checked === true){
        mostrarManiobras.style.display = 'block';
    }
}

function validarnoManiobras(e){
    e.preventDefault();
    if(maniobras[1].checked=== true){
        mostrarManiobras.style.display = 'none';
    }
}
