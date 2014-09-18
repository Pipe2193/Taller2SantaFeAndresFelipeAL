<!-- Formulario de registro de centro-->
<center>
  <form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">

    <!--Formulaario de registro de centro -->
    <div>
      <!--input de id-->
      <div>
        <div class="">
          <label for="txtId">ID Centro:</label>
        </div>
        <div>
          <input onKeypress="if (event.keyCode < 48 || event.keyCode > 57)
                event.returnValue = false;" type="text" value="<?php echo ((isset($txtId)) ? $txtId : '') ?>" id="txtId" name="txtId" class="campo" placeholder="Insert ID" required min="10" max="15">
        </div>
      </div>
      <!--input de Descripcion-->
      <div>
        <div class="">
          <label for="txtDesc">Descripcion Centro:</label>
        </div>
        <div>
          <input onkeypress="return validar(event)" type="text" value="<?php echo ((isset($txtDesc)) ? $txtDesc : '') ?>" id="txtDesc" name="txtDesc" class="campo" placeholder="Insert Descripcion" required min="10" max="25">
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
      <!--input de Direccion-->
      <div>
        <div class="">
          <label for="txtDir">Direccion:</label>
        </div>
        <div>
          <input  type="text" value="<?php echo ((isset($txtDir)) ? $txtDir : '') ?>" id="txtDir" name="txtDir" class="campo" placeholder="Insert Address" required min="2" max="3">
        </div>
      <!--select de Ciudad-->
      <div>
        <label>Ciudad:</label></br>
        <select name="idCiudad" required>
          <option>-Seleccionar-</option>
          <?php foreach ($ciudad as $dato): ?>
            <option value="<?php echo $dato['cod_ciudad'] ?>" <?php echo ($dato['cod_ciudad'] == 1) ? 'selected' : '' ?> ><?php echo $dato['nom_ciudad'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
      </br>
    </div>
    <button type="submit" class="boton_enviar">Registrar</button>

    <div id="backform">
      <nav>
        <div class="backbutton">
          <li><a href="index.php">Centro</a></li>
        </div>
      </nav>
    </div>
  </form>
</center>