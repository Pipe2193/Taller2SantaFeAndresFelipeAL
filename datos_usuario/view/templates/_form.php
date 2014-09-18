<!-- Formulario de registro de datos usuario-->
<center>
  <form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">

    <!--Formulaario de registro de datos usuario -->
    <div>
      <!--input de id-->
      <div>
        <div class="">
          <label for="txtId">ID:</label>
        </div>
        <div>
          <input onKeypress="if (event.keyCode < 48 || event.keyCode > 57)event.returnValue = false;" type="text" value="<?php echo ((isset($txtId)) ? $txtId : '') ?>" id="txtId" name="txtId" class="campo" placeholder="Insert ID" required min="10" max="15">
        </div>
      </div>
      <!--input de idusuario-->
      <div>
        <div class="">
          <label for="txtIdUser">ID usuario:</label>
        </div>
        <div>
          <input onKeypress="if (event.keyCode < 48 || event.keyCode > 57)
                event.returnValue = false;" type="text" value="<?php echo ((isset($txtIdUser)) ? $txtIdUser : '') ?>" id="txtIdUser" name="txtIdUser" class="campo" placeholder="Insert ID User" required min="10" max="15">
        </div>
      </div>
      <!--input de nombre-->
      <div>
        <div class="">
          <label for="txtNombre">Nombre:</label>
        </div>
        <div>
          <input onkeypress="return validar(event)" type="text" value="<?php echo ((isset($txtNombre)) ? $txtNombre : '') ?>" id="txtNombre" name="txtNombre" class="campo" placeholder="Insert Name" required min="10" max="25">
        </div>
      </div>
      <!--input de apellido-->
      <div>
        <div class="floatLeft">
          <label for="txtApellido">Apellido:</label>
        </div>
        <div>
          <input onkeypress="return validar(event)" type="text" value="<?php echo ((isset($txtApellido)) ? $txtApellido : '') ?>" id="txtApellido" name="txtApellido" class="campo" placeholder="Insert LastName" required min="10" max="25">
        </div>
      </div>

      <!--input de Edad-->
      <div>
        <div class="floatLeft">
          <label for="txtDireccion">Direccion:</label>
        </div>
        <div>
          <input  type="text" value="<?php echo ((isset($txtDireccion)) ? $txtDireccion : '') ?>" id="txtDireccion" name="txtDireccion" class="campo" placeholder="Insert Direccion" required min="10" max="25">
        </div>
      </div>
      <!--input de Telefono-->
      <div>
        <div class="floatLeft">
          <label for="txtTel">Telefono:</label>
        </div>
        <div>
          <input onKeypress="if (event.keyCode < 48 || event.keyCode > 57)
                event.returnValue = false;" type="text" value="<?php echo ((isset($txtTel)) ? $txtTel : '') ?>" id="txtTel" name="txtTel" class="campo" placeholder="Insert Phone Number" required min="7" max="20">
        </div>
      </div>
      <!--input de localidad-->
      <div>
        <div class="floatLeft">
          <label for="txtLocalidad">localidad:</label>
        </div>
        <div>
          <input onKeypress="if (event.keyCode < 48 || event.keyCode > 57)event.returnValue = false;" value="<?php echo ((isset($txtLocalidad)) ? $txtLocalidad : '') ?>" id="txtLocalidad" name="txtLocalidad" class="campo" placeholder="Insert Localidad" required min="10" max="25">
        </div>
      </div>
      </br>
    </div>
    <button type="submit" class="boton_enviar">Registrar</button>

    <div id="backform">
      <nav>
        <div class="backbutton">
          <li><a href="index.php">Datos de Usuario</a></li>
        </div>
      </nav>
    </div>
  </form>
</center>