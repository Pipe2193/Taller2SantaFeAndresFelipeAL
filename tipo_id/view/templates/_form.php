<!-- Formulario de registro de Tipo ID-->
<center>
  <form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">

    <!--Formulaario de registro -->
    <div>
      <!--input de id-->
      <div>
        <div class="">
          <label for="txtId">codigo de tipo de identificacion:</label>
        </div>
        <div>
          <input onKeypress="if (event.keyCode < 48 || event.keyCode > 57)
                event.returnValue = false;" type="text" value="<?php echo ((isset($txtId)) ? $txtId : '') ?>" id="txtId" name="txtId" class="campo" placeholder="Insert ID" required min="10" max="15">
        </div>
      </div>
      <!--input de descripcion-->
      <div>
        <div class="">
          <label for="txtDescripcion">tipo de identificacion:</label>
        </div>
        <div>
          <input onkeypress="return validar(event)" type="text" value="<?php echo ((isset($txtDescripcion)) ? $txtDescripcion : '') ?>" id="txtDescripcion" name="txtDescripcion" class="campo" placeholder="Insert tipo ID" required min="10" max="25">
        </div>
      </div>
      </br>
    </div>
    <button type="submit" class="boton_enviar">Registrar</button>

    <div id="backform">
      <nav>
        <div class="backbutton">
          <li><a href="index.php">Tipo Id</a></li>
        </div>
      </nav>
    </div>
  </form>
</center>