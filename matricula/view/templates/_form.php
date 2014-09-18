<!-- Formulario de registro de matricula-->
<center>
  <form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">

    <!--Formulaario de registro de matricula -->
    <div>
      <!--input de numero de la ficha-->
      <div>
        <div class="">
          <label for="txtFicha">Numero de la Ficha:</label>
        </div>
        <div>
          <input onKeypress="if (event.keyCode < 48 || event.keyCode > 57)
                event.returnValue = false;" type="text" value="<?php echo ((isset($txtFicha)) ? $txtFicha : '') ?>" id="txtFicha" name="txtFicha" class="campo" placeholder="Insert Ficha" required min="10" max="15">
        </div>
      </div>
      <!--input de ID aprendiz-->
      <div>
        <div class="">
          <label for="idApre">Numero de Identificacion:</label>
        </div>
        <div>
          <input onKeypress="if (event.keyCode < 48 || event.keyCode > 57)
                event.returnValue = false;" type="text" value="<?php echo ((isset($idApre)) ? $idApre : '') ?>" id="idApre" name="idApre" class="campo" placeholder="Insert ID" required min="10" max="15">
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
    <button type="submit" class="boton_enviar">Registrar</button>

    <div id="backform">
      <nav>
        <div class="backbutton">
          <li><a href="index.php">Matriculas</a></li>
        </div>
      </nav>
    </div>
  </form>
</center>