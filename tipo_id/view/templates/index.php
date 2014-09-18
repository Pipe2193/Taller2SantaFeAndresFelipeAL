<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="ISO-8859-1">
    <title></title>
    <link href="../../css/tables.css" rel="stylesheet" type="text/css"/>
    <link href="../../css/form.css" rel="stylesheet" type="text/css"/>
  </head>
  <body>
    <h1>Tipos De Identificacion</h1>

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
          <th>Codigo Del ID</th>
          <th>Tipo De Identificacion</th>
          <th>Options</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($datos as $row): ?>
          <tr>

            <td><?php echo $row['cod_tip_id'] ?></td>
            <td><?php echo $row['desc_tip_id'] ?></td>
            <td><a href="index.php?action=update&id=<?php echo $row['cod_tip_id'] ?>">Modificar</a> - <a href="index.php?action=delete&id=<?php echo $row['cod_tip_id'] ?>">Eliminar</a></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </body>
</html>
