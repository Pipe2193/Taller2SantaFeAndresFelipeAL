<!-- Formulario de registro de credencial-->
<center>
  <form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">

    <!--Formulaario de registro credencial -->
    <div>
      <!--input de id-->
      <div>
        <div class="">
          <label for="txtId">ID:</label>
        </div>
        <div>
          <input onKeypress="if (event.keyCode < 48 || event.keyCode > 57)
            event.returnValue = false;" type="text" value="<?php echo ((isset($txtId)) ? $txtId : '') ?>" id="txtId" name="txtId" class="Rcampo" placeholder="Insert ID" readonly="txtId" required min="10" max="15">
        </div>
      </div>
      <!--input de usuario id-->
      <div>
        <div class="">
          <label for="txtuser">user ID:</label>
        </div>
        <div>
          <input onKeypress="if (event.keyCode < 48 || event.keyCode > 57)
                event.returnValue = false;" type="text" value="<?php echo ((isset($txtuser)) ? $txtuser : '') ?>" id="txtuser" name="txtuser" class="campo" placeholder="Insert user ID" required min="10" max="15">
        </div>
      </div>
      <!--input de credencial id-->
      <div>
        <div class="">
          <label for="txtcredencial">credencial ID:</label>
        </div>
        <div>
          <input onKeypress="if (event.keyCode < 48 || event.keyCode > 57)
                event.returnValue = false;" type="text" value="<?php echo ((isset($txtcredencial)) ? $txtcredencial : '') ?>" id="txtcredencial" name="txtcredencial" class="campo" placeholder="Insert  credencial ID" required min="10" max="15">
        </div>
      </div>
      </br>
    </div>
    <button type="submit" class="boton_enviar">Modificar</button>

    <div id="backform">
      <nav>
        <div class="backbutton">
          <li><a href="index.php">Credencial</a></li>
        </div>
      </nav>
    </div>
  </form>
</center>