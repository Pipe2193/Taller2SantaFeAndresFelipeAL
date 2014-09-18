<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Matriculas</title>
    <link href="../../css/tables.css" rel="stylesheet" type="text/css"/>
    <link href="../../css/form.css" rel="stylesheet" type="text/css"/>
  </head>
  <body>
    <h1>Matriculas</h1>

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
          <th>Ficha</th>
          <th> ID Aprendiz</th>
          <th>estado</th>
          <th>Opciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($datos as $row): ?>
          <tr>

            <td><?php echo $row['num_ficha'] ?></td>
            <td><?php echo $row['id_apre'] ?></td>
            <td><?php echo $row['estado'] ?></td>
            <td><a href="index.php?action=update&id=<?php echo $row['num_ficha'] ?>">Modificar</a> - <a href="index.php?action=delete&id=<?php echo $row['num_ficha'] ?>">Eliminar</a></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </body>
</html>
