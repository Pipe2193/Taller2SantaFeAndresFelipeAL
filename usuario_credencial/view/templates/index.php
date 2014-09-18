<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>crendencial</title>
    <link href="../../css/style.css" rel="stylesheet" type="text/css"/>
    <link href="css/form.css" rel="stylesheet" type="text/css"/>
  </head>
  <body>
    <h1>crendencial</h1>
    <?php if (isset($error)): ?>
      <div class="error"><?php echo $error ?></div>
    <?php endif ?>

    <?php if (isset($success)): ?>
      <div class="success"><?php echo $success ?></div>
    <?php endif ?>
    <table  border="1" id="tblContenido">
      <thead>
        <tr>
          <th>ID</th>
          <th>usuario id</th>
          <th>credencial is</th>
          <th>opciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($datos as $row): ?>
          <tr>

            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['usuario_id'] ?></td>
            <td><?php echo $row['credencial_id'] ?></td>
            <td><a href="index.php?action=update&id=<?php echo $row['id'] ?>">Modificar</a> - <a href="index.php?action=delete&id=<?php echo $row['id'] ?>">Eliminar</a></td>

          </tr>

        <?php endforeach ?>
      </tbody>
    </table>
  </body>
</html>
