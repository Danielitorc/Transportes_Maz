<link rel="stylesheet" href="../../../css/normalize.css">
    <link rel="stylesheet" href="../../estilos/styleTablero.css">

<form action="" class="form_choferes">
            <fieldset>
                <legend>Datos del Chofer</legend>

                <div class="campos3">
                    <div class="campo">
                        <label for="nombre">Nombre</label>
                        <input class="cajaTexto" type="text" id="nombre" name="nombre">
                    </div>

                    <div class="campo">
                        <label for="apellidos">Apellidos</label>
                        <input class="cajaTexto" type="text" id="apellidos" name="apellidos">
                    </div>

                    <div class="campo">
                        <label for="telefono">Teléfono</label>
                        <input class="cajaTexto" type="tel" id="telefono" name="telefono">
                    </div>


                </div>

                <div class="campos4 abajo">
                    <div class="campo">
                        <select name="licencia" id="licencia">
                            <option value="" disabled selected>-- Seleccione Tipo de Licencia</option>
                            <option value="Licencia tipo A">Licencia tipo A</option>
                            <option value="Licencia tipo B">Licencia tipo B</option>
                            <option value="Licencia tipo C">Licencia tipo C</option>
                            <option value="Licencia tipo D">Licencia tipo D</option>
                            <option value="Licencia tipo E">Licencia tipo E</option>
                            <option value="Licencia tipo E1">Licencia tipo E1</option>
                        </select>
                    </div>

                    <div class="campo">
                        <label for="numLicencia">Número Licencia</label>
                        <input class="cajaTexto" type="text" id="numLicencia" name="numLicencia">
                    </div>

                    <div class="campo">
                        <label for="correo">Correo Electrónico</label>
                        <input class="cajaTexto" type="email" id="correo" name="correo">
                    </div>

                    <div class="campo">
                        <label for="fechaNac">Fecha Nacimiento</label>
                        <input name="fechaNac" type="date" onclick="this.value = '1970-01-01';" id="fechaNac" />
                    </div>
                </div>

                <div class="input_100">
                    <div class="campo">
                        <label for="direccion">Dirección Completa</label>
                        <textarea name="direccion" placeholder="Ingrese la dirección completa del chofer" id="direccion"></textarea>
                    </div>

                </div>
            </fieldset>

            <div class="campo enviar">
                <input type="hidden" id="accion" value="crear">
                <input type="submit" value="GUARDAR">
            </div>
        </form>