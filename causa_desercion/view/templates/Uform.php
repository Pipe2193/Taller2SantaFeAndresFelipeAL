<!-- Formulario de modificacion de causa desercion-->
<center>
  <form method="post" action="<?php echo $formAction ?>" enctype="application/x-www-form-urlencoded">

    <!--Formulaario de modificacion de causa desercion -->
    <div>
      <!--input de id-->
      <div>
        <div class="">
          <label for="txtId">ID Causa:</label>
        </div>
        <div>
          <input onKeypress="if (event.keyCode < 48 || event.keyCode > 57)
            event.returnValue = false;" type="text" value="<?php echo ((isset($txtId)) ? $txtId : '') ?>" id="txtId" name="txtId" class="Rcampo" placeholder="Insert ID"  readonly="txtId" required min="10" max="15">
        </div>
      </div>
      <!--select de descripcion causa-->
      <div>
        <label>Descripcion De Causa:</label></br>
        <select name="desCausa" required>
          <option><?php echo $args['desCausa'] ?></option>
          <?php foreach ($causa as $dato): ?>
            <option value="<?php echo $dato['desc_causa'] ?>" <?php echo ($dato['desc_causa'] == 1) ? 'selected' : '' ?> ><?php echo $dato['desc_causa'] ?></option>
          <?php endforeach ?>
        </select>
      </div> 
      </br>
      <!--input de estado-->
      <div>
        <div class="">
          <label for="txtEstado">Estado:</label>
        </div>
        <div>
          <input onkeypress="return validar(event)" type="text" value="<?php echo ((isset($txtEstado)) ? $txtEstado : '') ?>" id="txtEstado" name="txtEstado" class="campo" placeholder="Insert Estado" required min="10" max="25">
        </div>
      </div>

      </br>
    </div>
    <button type="submit" class="boton_enviar">Modificar</button>

    <div id="backform">
      <nav>
        <div class="backbutton">
          <li><a href="index.php">Causas De Desercion</a></li>
        </div>
      </nav>
    </div>
  </form>
</cent