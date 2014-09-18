<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="css/formulario.css">
    <link href="css/form.css" rel="stylesheet" type="text/css"/>
  </head>
  <header>
    <h1>Modificar Matricula</h1>      
  </header>
  <section height="500">
    <?php if (isset($error)): ?>
      <div class="error"><?php echo $error ?></div>
    <?php endif ?>

    <?php if (isset($success)): ?>
      <div class="success"><?php echo $success ?></div>
    <?php endif ?>
    <?php include 'Uform.php'; ?>
  </section>
</html>