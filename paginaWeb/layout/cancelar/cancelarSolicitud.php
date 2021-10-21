<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/normalize.css">
    <link rel="stylesheet" href="../../../css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Actualizar Solicitud | TM</title>
</head>

<header class="pag_anexa">
    <a href="../../../index.php" class="brand">
        <img src="../../../img/logo.png" alt="Logo TM">
    </a>

    <nav class="menu">
        <div class="btn">
            <i class="fas fa-times close-btn"></i>
        </div>
        <ul>
            <li><a class="negrita" href="../../../index.php">Inicio</a></li>
            <li><a class="negrita" href="../../../index.php#services">Servicios</a></li>
            <li><a class="negrita" href="../cancelar/">CANCELAR SOLICITUD</a></li>
        </ul>
    </nav>
    <div class="btn">
        <i class="fas fa-bars menu-btn"></i>
    </div>
</header>

<?php
require_once('../../funciones/funciones.php');
?>

<div class="contenedor">
    <div class="ingresarFolio contenedor">
        <div class="campo_folio">
            <label for="folioSolicitu" class="folioSolicitu">Ingrese el Folio de Solicitud</label>
        </div>

        <div class="campo_folio">
            <input type="text" name="folioSolicitu" id="folioSolicitu">
        </div>

        <div class="campo_enviar campo_folio">
            <a id="enviar">CANCELAR</a>
        </div>
    </div>    
</div>

<div class="imagen">
            <img src="../../../img/folioMarcado.png" alt="">
        </div>
    <div class="errors"></div>
    <div class="corrects"></div>

<script type="text/javascript">
        //javascript for navigation bar effect on scroll
        window.addEventListener("scroll", function() {
            var header = document.querySelector("header");
            header.classList.toggle('down', window.scrollY > 0);

            //change logo
            var logo = document.querySelector(".brand img");
            if (window.scrollY > 0) {
                logo.setAttribute('src', '../img/logo.png');
            } else {
                logo.setAttribute('src', '../img/logo.png');
            }

        });

        //Menu responsivo
        var menu = document.querySelector('.menu');
        var menuBtn = document.querySelector('.menu-btn');
        var closeBtn = document.querySelector('.close-btn');

        menuBtn.addEventListener("click", () => {
            menu.classList.add('active');
        });

        closeBtn.addEventListener("click", () => {
            menu.classList.remove('active');
        });


        let errors = document.querySelector('.errors');
        const enviarFolio = document.querySelector('#enviar');

        enviarFolio.addEventListener('click', folioSolicitud);

        function folioSolicitud(e){
            e.preventDefault();

            const idSolicitud = document.querySelector('#folioSolicitu').value;

            errors.innerHTML = '';

            if(!/^([0-9])*$/.test(idSolicitud)){
                errors.style.display = 'block';
                errors.innerHTML += '<li>El folio solo debe contener números</li>';
                setTimeout(() => {
                    errors.style.display = 'none';
                }, 4500);
            }else{
             
                    location.assign(`actualizarSolicitud.php?id=${idSolicitud}`)
                    // window.location.replace(`actualizarSolicitud.php?id=${idSolicitud}`)
              
            }
            
        }

    </script>
