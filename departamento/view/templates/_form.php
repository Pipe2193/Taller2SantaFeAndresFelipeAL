<!-- Formulario de registro de departamentos-->
<center>
  <form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">

    <!--Formulaario de registro de departamentos -->
    <div>
      <!--input de id-->
      <div>
        <div class="">
          <label for="txtId">ID:</label>
        </div>
        <div>
          <input onKeypress="if (event.keyCode < 48 || event.keyCode > 57)
                event.returnValue = false;" type="text" value="<?php echo ((isset($txtId)) ? $txtId : '') ?>" id="txtId" name="txtId" class="campo" placeholder="Insert ID" required min="10" max="15">
        </div>
      </div>
      <!--input de departamento-->
      <div>
        <div class="">
          <label for="txtDepto">Departamento:</label>
        </div>
        <div>
          <input onkeypress="return validar(event)" type="text" value="<?php echo ((isset($txtDepto)) ? $txtDepto : '') ?>" id="txtDepto" name="txtDepto" class="campo" placeholder="Insert Departamento" required min="10" max="25">
        </div>
      </div>
    </div>
    <button type="submit" class="boton_enviar">Registrar</button>

    <div id="backform">
      <nav>
        <div class="backbutton">
          <li><a href="index.php">Departamentos</a></li>
        </div>
      </nav>
    </div>
  </form>
</center>