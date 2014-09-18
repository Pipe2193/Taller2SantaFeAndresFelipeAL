<!-- Formulario de modificacion de un programa-->
<center>
  <form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">

    <!--Formulaario de modificacion de un programa -->
    <div>
      <!--input de codigo del programa-->
      <div>
        <div class="">
          <label for="idProg">Codigo del Programa:</label>
        </div>
        <div>
          <input onKeypress="if (event.keyCode < 48 || event.keyCode > 57)
                event.returnValue = false;" type="text" value="<?php echo ((isset($idProg)) ? $idProg : '') ?>" id="idProg" name="idProg" class="Rcampo" placeholder="Insert Codigo Del Programa" readonly="idProg" required min="10" max="20">
        </div>
      </div>
      <!--input de descripcion del programa-->
      <div>
        <div class="">
          <label for="txtDescripcion">Descripcion del Programa:</label>
        </div>
        <div>
          <input onkeypress="return validar(event)" type="text" value="<?php echo ((isset($txtDescripcion)) ? $txtDescripcion : '') ?>" id="txtDescripcion" name="txtDescripcion" class="campo" placeholder="Insert Descripcion" required min="10" max="35">
        </div>
      </div>
      <!--input de Estado-->
      <div>
        <div class="">
          <label for="txtEstado">Estado:</label>
        </div>
        <div>
          <input onkeypress="return validar(event)" type="text" value="<?php echo ((isset($txtEstado)) ? $txtEstado : '') ?>" id="txtEstado" name="txtEstado" class="campo" placeholder="Insert Estado" required min="10" max="25">
        </div>
      </div>
      <br>
    </div>
    <button type="submit" class="boton_enviar">Modificar</button>

    <div id="backform">
      <nav>
        <div class="backbutton">
          <li><a href="index.php">Programas</a></li>
        </div>
      </nav>
    </div>
  </form>
</center>