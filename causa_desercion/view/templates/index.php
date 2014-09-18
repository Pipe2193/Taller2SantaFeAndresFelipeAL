<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>causa Desercion</title>
    <link href="../../css/tables.css" rel="stylesheet" type="text/css"/>
    <link href="../../css/form.css" rel="stylesheet" type="text/css"/>
  </head>
  <body>
    <h1>Causa Desercion</h1>

    <?php if (isset($error)): ?>
      <div class="error">
        <?php echo $error ?>
      </div>
    <?php endif ?>

    <?php if (isset($success)): ?>
      <div class="success">
        <?php echo $success ?>
      </div>
    <?php endif ?>
    <table  border="1" id="tblContenido">
      <thead>
        <tr>
          <th>Codigo Causa</th>
          <th>Descripcion de la Causa</th>
          <th>Estado</th>
          <th>Options</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($datos as $row): ?>
          <tr>

            <td><?php echo $row['cod_causa'] ?></td>
            <td><?php echo $row['desc_causa'] ?></td>
            <td><?php echo $row['estado'] ?></td>
            <td><a href="index.php?action=update&id=<?php echo $row['cod_causa'] ?>">Modificar</a> - <a href="index.php?action=delete&id=<?php echo $row['cod_causa'] ?>">Eliminar</a></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </body>
</html>
