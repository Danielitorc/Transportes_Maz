<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <title>Gestion Choferes</title>
</head>

<body>

    <!-- Cabecera del listado de choferes "buscar mostrar y ocultar formulario" -->
    <div class="contenedor">
        <div class="campos2">

            <!-- <div>
                <label for="">Buscar Chofer</label>
                <input class="cajaTexto" type="text" id="buscar">
            </div> -->

            <div class="nuevoChofer">
                <label for="btn_nuevoChofer">Agregar Nuevo</label>
                <a href="pestañas/choferes/formChoferes.php" class="btn_nuevoChofer btn"><i class="far fa-plus-square" ></i></a>
            </div>
        </div>

    </div>

    <div class="tabla-pendientes">
        <?php include 'funciones/funcionesChofer.php'; ?>

        <h2>Listado de Choferes</h2>
        <div class="lChoferes">
            <table id="listado-choferes">
                <thead>
                    <tr>

                        <th>IdChofer</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                        <th>Tipo Licencia</th>
                        <th>Numero Licencia</th>
                        <th>Correo</th>
                        <th>Acciones</th>

                    </tr>
                </thead>

                <tbody>
                    <tr>

                    <?php
                $choferes = obtenerChoferes();
                if($choferes->num_rows){ 
                    foreach($choferes as $chofer){?>
                        <tr>
                            
                            
                            <td><?php echo $chofer['idChofer'] ;?></td>
                            <td><?php echo $chofer['nombre'] ;?></td>
                            <td><?php echo $chofer['apellidos'];?></td>
                            <td><?php echo $chofer['telefono'];?></td>
                            <td><?php echo $chofer['tipoLicencia'];?></td>
                            <td><?php echo $chofer['numLicencia'];?></td>
                            <td><?php echo $chofer['correo'];?></td>
                            <td>
                            <a href="pestañas/choferes/editarChofer.php?id=<?php echo $chofer['idChofer']; ?>" class="btn-editar btn">
                                <i class="fas fa-pen-square"></i>
                            </a>
                            <button data-id="<?php echo $chofer['idChofer']; ?>" type="button" class="btn-borrar btn">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                        </tr>

                    <?php } 
            } ?>

                      
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript">

        const listadoChoferes = document.querySelector('#listado-choferes  tbody');
        // const inputBuscador = document.querySelector('#buscar');
        
        
        eventListeners();

        function eventListeners(){
            listadoChoferes.addEventListener('click', eliminarContacto);

            //Buscar Chofer por nombre
            // inputBuscador.addEventListener('input', buscarChofer);

        }

        // function buscarChofer(e){
            
        //     const expresion = new RegExp(e.target.value);
        //     const registros = document.querySelectorAll('tbody tr');

        //     registros.forEach(registro => {
        //        registro.style.display = 'none';

        //        if(registro.childNodes[1].textContent.replace(/\s/g, " ").search(expresion) != -1 ){
        //             registro.style.display = 'table-row';
        //        }
               
        //   })

            
        // }

        function eliminarContacto(e){

            if(e.target.parentElement.classList.contains('btn-borrar')){
                //Tomar el id que se va eliminar
                const id = e.target.parentElement.getAttribute('data-id');

                const respuesta = confirm('Esta seguro que desea eliminar al Chofer');

                if(respuesta){
                    //LLAMADO AJAX
                    //CREO EL OBJETO
                    const xhr = new XMLHttpRequest();

                    //ABRO LA CONEXION                       ?id=${respuesta.datos.id_insert_cot}
                    xhr.open('GET', `pestañas/choferes/modelo/modelo-chofer.php?id=${id}&accion=borrar`, true);

                    //LEO RESPUESTA
                    xhr.onload = function(){
                        if(this.status == 200){
                            const resultado = JSON.parse( xhr.responseText);
                            console.log(resultado);

                            if(resultado.respuesta == 'correcto'){

                                //Lo elimino del DOM (Tabla)
                                console.log(e.target.parentElement.parentElement.parentElement);
                                e.target.parentElement.parentElement.parentElement.remove();


                                //Muestro Notificacion de que se elimino correctamente
                                console.log("Se elimino correctamente")
                            }
                        }
                    }
                    //ENVIO PETICION
                    xhr.send();
                }else{
                    console.log('NMOOOOOOO Eliminado...')

                }

            }
        }


    </script>

</body>

</html>