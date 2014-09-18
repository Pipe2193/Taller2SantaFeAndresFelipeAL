<!-- Formulario de registro de localidad-->
<center>
  <form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">

    <!--Formulaario de registro de localidad -->
    <div>
      <!--input de id-->
      <div>
        <div class="">
          <label for="txtId">ID::</label>
        </div>
        <div>
          <input onKeypress="if (event.keyCode < 48 || event.keyCode > 57)event.returnValue = false;" type="text" value="<?php echo ((isset($txtId)) ? $txtId : '') ?>" id="txtId" name="txtId" class="campo" placeholder="Insert ID" required min="10" max="15">
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
          <label for="txtLocalidad">Localidad:</label>
        </div>
        <div>
          <input onKeypress="if (event.keyCode < 48 || event.keyCode > 57)event.returnValue = false;" type="text" value="<?php echo ((isset($txtLocalidad)) ? $txtLocalidad : '') ?>" id="txtLocalidad" name="txtLocalidad" class="campo" placeholder="Insert Localidad" required min="10" max="25">
        </div>
      </div>
      </br>
    </div>
    <button type="submit" class="boton_enviar">Registrar</button>

    <div id="backform">
      <nav>
        <div class="backbutton">
          <li><a href="index.php">Localidades</a></li>
        </div>
      </nav>
    </div>
  </form>
</center>