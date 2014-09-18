<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Centro</title>
    <link href="../../css/tables.css" rel="stylesheet" type="text/css"/>
    <link href="../../css/form.css" rel="stylesheet" type="text/css"/>
  </head>
  <body>
    <h1>Centro</h1>

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
          <th>ID</th>
          <th>Descripcion</th>
          <th>Phone</th>
          <th>Address</th>
          <th>Cod_ciudad</th>
          <th>Options</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($datos as $row): ?>
          <tr>

            <td><?php echo $row['cod_centro'] ?></td>
            <td><?php echo $row['desc_centro'] ?></td>
            <td><?php echo $row['telefono'] ?></td>
            <td><?php echo $row['dir'] ?></td>
            <td><?php echo $row['cod_ciudad'] ?></td>
            <td><a href="index.php?action=update&id=<?php echo $row['cod_centro'] ?>">Modificar</a> - <a href="index.php?action=delete&id=<?php echo $row['cod_centro'] ?>">Eliminar</a></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </body>
</html>
